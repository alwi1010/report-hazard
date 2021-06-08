<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee2 extends CI_Controller{

	function __construct(){
		parent::__construct();		
		$this->load->helper('url','html');
	}


	public function index(){
		$this->load->model('m_data');
		$this->load->helper('form');
		$data['dropdown'] = $this->m_data->tampil_data();
		$this->load->view('report_hazard', $data);
	}



	// Start Input

		public function save_progress($problemId)
		{
			$this->load->model('m_data');

			$idstatuslaporan = "1";

			$dataprogress = array(
			  'IdMasalah'=>$problemId,
			  'IdStatusLaporan'=>$idstatuslaporan,
			  'TanggalProgress' =>date('Y-m-d'),
			  'JamProgress' =>date('H:i:s')
			);

	    if (!$this->m_data->save_progress_data($dataprogress,'tbprogress')) {
				$this->delete_report($problemId);
	    }
		}

		public function save_history($uploadedImage,$problemId){
			$this->load->model('m_data');

			$idstatuslaporan = "1";
			$keterangankegiatan = "Sedang Diperiksa Kevalidan Dari Datanya.";

			$datahistori = array(
		  	'IdMasalah'=>$problemId,
			  'IdStatusLaporan'=>$idstatuslaporan,
			  'FotoKegiatan' =>$uploadedImage,
			  'KeteranganKegiatan' =>$keterangankegiatan,
			  'TanggalAksi' =>date('Y-m-d'),
			  'JamAksi' =>date('H:i:s')
			);

	    if (!$this->m_data->save_history_data($datahistori,'tbhistorilaporan')) {
				$this->delete_progress($problemId);
				$this->delete_report($problemId);
	    }
		}

		public function report_hazard(){
			$this->load->model('m_data');
			$this->uploadPath = "asset/image_hazard/";
			$data = array();
			$reportStatus= "1";

			if ($this->input->post()){
				$p = $this->input->post();

				if (empty($_FILES["photohazard"]['name'])){
					echo "<script type='text/javascript'>window.alert('Belum Ada Foto'); window.location'".base_url('form-report-hazard/')."';</script>";
				}

				$nameReporter = $this->security->xss_clean($p["namereporter"]);
				$emailReporter = $this->security->xss_clean($p["emailpelapor"]);
				$nameUnit = $this->security->xss_clean($p["nameunit"]);
				$hazardLocation = $this->security->xss_clean($p["hazardlocation"]);
				$detailHazard = $this->security->xss_clean($p["detailhazard"]);

				$temp = explode(".", $_FILES["photohazard"]["name"]);
				$extensionImage = end($temp);

				$randomNumber = rand(1,99999);

				$parts = preg_split("/(,?\s+)|((?<=[a-z])(?=\d))|((?<=\d)(?=[a-z]))/i", $nameReporter);

				if (empty($nameReporter)){
					$parts = preg_split("/(,?\s+)|((?<=[a-z])(?=\d))|((?<=\d)(?=[a-z]))/i", $nameUnit);
				}
				
				$nameImage = $parts[0];
				$filenameUsed = $nameImage."-".$randomNumber."-".date('Ymd').".".$extensionImage;

				$codeLocation			= substr($hazardLocation, 0,4);
				$dataQueueNumber 	= $this->m_data->show_queue_number()->result();

				foreach ($dataQueueNumber as $valueArray) {
					$queueNumber		= $valueArray->NomorUrut;
					$problemNumber	= $queueNumber.'/'.$codeLocation.'/'.date('Ymd').'/'.date('His');
					$dateTime	= date('Y-m-d').' '.date('H:i:s');

					$dataInput = array(
						'NoMasalah' => $problemNumber,
						'NamaPelapor' => $nameReporter,
						'NamaInstansi' => $nameUnit,
						'EmailPelapor' => $emailReporter,
						'DetailPermasalahan' => $detailHazard,
						'NomorLokasi' => $hazardLocation,
						'FotoMasalah' => $filenameUsed,
						'TanggalLaporan' => date('Y-m-d'),
						'TimeLaporan' => date('H:i:s')
					);

					if ($this->m_data->save_report_data($dataInput,'tbmasalah')) {

						$reportId = $this->m_data->show_report_data()->row();
						$problemId = $reportId->IdMasalah;

						$updateQueueNumber	= $queueNumber+1;
						$dataUpdate					= array('NomorUrut' => $updateQueueNumber);

						$this->m_data->update_queue_number($dataUpdate,'tbnorut');

						$dataEmailAdmin = $this->m_data->show_email_admin();

						foreach ($dataEmailAdmin as $adminEmail) {
							if (count($dataEmailAdmin) === 1) {
								$emailAdmin = $adminEmail->EmailAdmin;
							} else {
								$implode[]	= $adminEmail->EmailAdmin;
								$emailAdmin = implode(', ', $implode);
							}
						}

						$this->save_progress($problemId);
						$this->save_history($filenameUsed,$problemId);

						$config["upload_path"] = $this->uploadPath;
						$config["allowed_types"] = "jpg|jpeg|png";
						$config["file_name"] = $filenameUsed; // New name for the files.

						$this->load->library("upload", $config);

						// Upload / Save Files To Server
						if ($this->upload->do_upload("photohazard")){
							$this->load->library("image_lib");

							$newWidth = $newHeight = 0;

							$uploadData			= $this->upload->data();
							$uploadedImage	= $uploadData["file_name"];
							$uploadedWidth	= $uploadData["image_width"];
							$uploadedHeight	= $uploadData["image_height"];
							$sourcePath 		= $this->uploadPath.$uploadedImage;
							$thumbPath			= $this->uploadPath.'thumb/'.$uploadedImage;

							if ($uploadedWidth < $uploadedHeight){
								$this->rotate_image($sourcePath);
							}

							$this->thumb_image($sourcePath,$thumbPath,$uploadedWidth,$uploadedHeight);

							if ($uploadedWidth > 1500 OR $uploadedWidth < 1500){
								$this->resize_image($sourcePath,$uploadedWidth,$uploadedHeight);
							}

							$this->send_email_to_admin($emailAdmin,$problemNumber);;
							$this->send_email_to_employee($emailReporter,$nameReporter,$dateTime);
						} else {
							// $this->upload->display_errors();
							// die();
							$this->delete_history($problemId);
							$this->delete_progress($problemId);
							$this->delete_report($problemId);

							echo "<script type='text/javascript'>window.alert('Laporan Anda Gagal Tersimpan Dikarenakan Terjadi Kesalahan Pada Saat Upload Foto. Mohon Untuk Memeriksa Kembali Foto Anda Dan Dipersilahkan Untuk Menginputkannya Kembali!!!'); window.location='".base_url('form-report-hazard/')."';</script>";
						}

						echo "<script type='text/javascript'>window.alert('Laporan Anda Telah Berhasil Tersimpan. Jika Laporan Anda Telah Selesai Kami Akan Memberitau Anda Melalui Email Anda'); window.location='".base_url('form-report-hazard/')."';</script>";
					} else {
						echo "<script type='text/javascript'>window.alert('Laporan Anda Gagal Tersimpan. Mohon Untuk Menginputkannya Kembali!!!'); window.location='".base_url('form-report-hazard/')."';</script>";
					}
					
				}

			} else {
				echo "<script type='text/javascript'>window.alert('Tidak Ada Data Yang Diinputkan'); window.location='".base_url('form-report-hazard/')."';</script>";
			}
		}

	// End Input



	// Start Edit

	// End Edit



	// Start Delete

		public function delete_report($problemId){
			$this->load->model('m_data');
	    if (!$this->m_data->delete_report_data($problemId)) {
				echo "<script type='text/javascript'>window.alert('Data Laporan Hazard Gagal Di Hapus.'); window.location='".base_url('form-report-hazard/')."';</script>";
	    }
		}

		public function delete_progress($problemId){
			$this->load->model('m_data');
	    if (!$this->m_data->delete_progress_data($problemId)) {
				echo "<script type='text/javascript'>window.alert('Data Progress Hazard Gagal Di Hapus.'); window.location='".base_url('form-report-hazard/')."';</script>";
	    }
		}


		public function delete_history($problemId){
			$this->load->model('m_data');
	    if (!$this->m_data->delete_history_data($problemId)) {
				echo "<script type='text/javascript'>window.alert('Data Histori Hazard Gagal Di Hapus.'); window.location='".base_url('form-report-hazard/')."';</script>";
	    }
		}

	// End Delete



	// Start Show

		public function show_chained(){
			$this->load->model('m_data');
			$id = $_POST['id'];

			echo "<option disabled='' selected='' value=''>- Pilih Lokasi Hazard -</option>";

			$dropdown_chained = $this->m_data->show_chained_data($id);

			foreach ($dropdown_chained->result() as $baris){
				echo "<option value='".$baris->NomorLokasi."'>$baris->KodeLokasi - $baris->NamaLokasi</option>";
			}
		}

	// End Show



	// Start Image

		public function rotate_image($sourcePath)
		{
			$config['image_library'] 	= 'gd2';
			$config['source_image'] 	= $sourcePath;
			$config['rotation_angle'] = '90';

			$this->image_lib->initialize($config);
			$this->image_lib->rotate();
			$this->image_lib->clear();
		}

		public function thumb_image($sourcePath,$thumbPath,$uploadedWidth,$uploadedHeight)
		{
			$thumbWidth					= 700;
			$percentThumbWidth	= $thumbWidth/$uploadedWidth*100;
			$thumbHeight				= round($percentThumbWidth/100*$uploadedHeight);

			$config['image_library']	= 'gd2';
			$config['source_image']		= $sourcePath;
			$config['new_image']			= $thumbPath;
			$config['create_thumb']		= TRUE;
			$config['maintain_ratio'] = TRUE;
			$config['width']					= $thumbWidth;
			$config['height']					= $thumbHeight;

			$this->image_lib->initialize($config);
			$this->image_lib->resize();
			$this->image_lib->clear();
		}


		public function resize_image($sourcePath,$uploadedWidth,$uploadedHeight){
			$newWidth			= 1500;
			$percentWidth = $newWidth/$uploadedWidth*100;
			$newHeight		= round($percentWidth/100*$uploadedHeight);

			// Image resize config
			$config['image_library']    = 'gd2';
			$config['source_image']     = $sourcePath;
			$config['maintain_ratio']   = TRUE;
			$config['width']            = $newWidth;
			$config['height']						= $newHeight;

			// Initialize image_lib library
			$this->image_lib->initialize($config);

			ini_set('gd.jpeg_ignore_warning', 1);

			// Resize image
			$this->image_lib->resize();
			$this->image_lib->clear();
		}

	// End Image



	// Start Email

		public function send_email_to_admin($emailAdmin,$problemNumber){
			$this->load->library('email');
	    $data['problemNumber'] = $problemNumber;
	    
	    $from = $this->config->item('smtp_user');
	    $to = $emailAdmin;
	    $subject = "Informasi Data Baru - PAPERDONE";
	    $message = $this->load->view('template/template_email_admin', $data, true);

	    $this->email->set_newline("\r\n");
	    $this->email->from($from,"SIPAPERDONE");
	    $this->email->to($to);
	    $this->email->subject($subject);
	    $this->email->message($message);
			
			$this->email->send();
		}


		public function send_email_to_employee($emailReporter,$nameReporter,$dateTime){
			$this->load->library('email');
	    $data['nameReporter'] = $nameReporter;
	    $data['dateTime'] = $dateTime;
	    
	    $from = $this->config->item('smtp_user');
	    $to = $emailReporter;
	    $subject = "PAPERDONE - I Gusti Ngurah Rai Bali";
	    $message = $this->load->view('template/template_email_employee', $data, true);

	    $this->email->set_newline("\r\n");
	    $this->email->from($from,"SIPAPERDONE");
	    $this->email->to($to);
	    $this->email->subject($subject);
	    $this->email->message($message);
			
			$this->email->send();
		}

	// End Email
}