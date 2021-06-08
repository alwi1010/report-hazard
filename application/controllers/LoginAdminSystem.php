<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginAdminSystem extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url','html');
	
		if($this->session->userdata('status')==="login"){
			redirect(base_url("admin"));
		}
	}


	public function index(){
		$this->load->view('admin/login_admin');
	}

	public function login_action(){
		$this->load->model('m_data');

		$data = $this->input->post();
		
		if ($data === NULL) {
			$this->load->view('errors/html/error_403');
		}
		
		$eas = $this->security->xss_clean($data["emailadmin"]);
		$pwd = $this->security->xss_clean($data["passadmin"]);

		$check = $this->m_data->check_email_admin($eas);

		if ($check == NULL) {
			echo '<script language="javascript">window.alert("Data Tidak Di Temukan! Mohon Periksa Kembali Username Dan Password Anda!"); window.location="'.base_url("login-admin/").'";</script>';
		}

		$pass = $check['PassAdmin'];
    if (password_verify(base64_encode(hash_hmac("sha512", $pwd, "paperdone", true)), $pass)) {
			$this->load->library('session');
			$date = date("Y-m-d");
			$time = date("H:i:s");
			$uname = $check['UsernameAdmin'];
			$log = array(
				'IdAdmin' => $check['IdAdmin'],
				'TanggalLog' => $date,
				'WaktuLog' => $time
			);

			$this->m_data->input_log("loginlogadmin",$log);
 
			$data_session = array(
				'idadmin' => $check['IdAdmin'],
				'username' => $uname,
				'status' => "login"
			);
			
			$this->session->set_userdata($data_session);
			$this->kirim_email_login($date,$time,$eas,$uname);
    } else {
	    echo '<script language="javascript">window.alert("Username Dan Password Salah! Mohon Periksa Kembali Username Dan Password Anda."); window.location="'.base_url("login-admin/").'";</script>';
    }
	}

	function kirim_email_login($date = null, $time = null, $eas = null, $uname = null){
    $this->load->library('email');

    if (!isset($date,$time,$email,$uname)) {
    	$this->load->view('errors/html/error_403');
    }

  	$data['date'] = $date;
  	$data['time'] = $time;
  	$data['email'] = $eas;
  	$data['uname'] = $uname;
    
    $from = $this->config->item('smtp_user');
    $to = $eas;
    $subject = "Pemberitahuan Login - PAPERDONE I Gusti Ngurah Rai Bali";
    $message = $this->load->view('template/template_email_login_admin', $data, true);

    $this->email->set_newline("\r\n");
    $this->email->from($from,'SIPAPERDONE');
    $this->email->to($to);
    $this->email->subject($subject);
    $this->email->message($message);

    if ($this->email->send()) {
    	echo '<script language="javascript">window.alert("Selamat Anda Telah Berhasil Login!!!"); window.location="'.base_url("admin").'";</script>';
    }
	}
}