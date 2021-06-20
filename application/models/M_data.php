<?php 

class M_data extends CI_Model{

	// Start Input

		public function save_report_data($dataInput,$table){
			return $this->db->insert($table,$dataInput);
				// return FALSE;
		}

		public function save_progress_data($dataprogress,$table){
			return $this->db->insert($table,$dataprogress);
				// return FALSE;
		}

		public function save_history_data($datahistori,$table){
			return $this->db->insert($table,$datahistori);
				// return FALSE;
		}

		public function input_log($table,$log){
			$this->db->insert($table,$log);
		}

	// End Input


	// Start Edit

		function update_queue_number($dataUpdate,$table){
			$this->db->replace($table, $dataUpdate);
		}

	// End Edit


	// Start Delete

		function delete_report_data($problemId){
			$query = $this->db->query("DELETE FROM tbmasalah WHERE IdMasalah = '$problemId'");
			return $query;
		}

		function delete_progress_data($problemId){
			$query = $this->db->query("DELETE FROM tbprogress WHERE IdMasalah = '$problemId'");
			return $query;
		}

		function delete_history_data($problemId){
			$query = $this->db->query("DELETE FROM tbhistorilaporan WHERE IdMasalah = '$problemId'");
			return $query;
		}

	// End Delete


	// Start Show

		public function tampil_data(){
			return $this->db->get('tbarea')->result();
		}

		public function show_chained_data($id){
			$query = $this->db->query("SELECT * FROM tblokasi WHERE IdArea = '$id'");
			return $query;
		}

		public function show_queue_number(){
			return $this->db->get('tbnorut');
		}

		public function show_report_data(){
			return $selectdata = $this->db->select('IdMasalah')->order_by('IdMasalah',"desc")->limit(1)->get('tbmasalah');
		}

		public function show_email_admin(){
			return $this->db->query("SELECT EmailAdmin FROM tbadmin")->result();
				// return $this->db->get('tbadmin')->result();
		}

		public function check_email_admin($eas){
			return $this->db->query("SELECT IdAdmin, UsernameAdmin, PassAdmin FROM `tbadmin` WHERE EmailAdmin='$eas'")->row_array();
		}
		
		public function year_data_chart($month,$year)
		{
			return $query = $this->db->query("SELECT TanggalLaporan FROM tbmasalah WHERE MONTH(TanggalLaporan) = '$month' AND YEAR(TanggalLaporan) = '$year'")->num_rows();
		}

		public function month_week_data_chart($date,$month,$year)
		{
			return $query = $this->db->query("SELECT TanggalLaporan FROM tbmasalah WHERE DAY(TanggalLaporan) = '$date' AND MONTH(TanggalLaporan) = '$month' AND YEAR(TanggalLaporan) = '$year'")->num_rows();
		}

		function history_problem_data(){
			$this->db->select('IdMasalah, NoMasalah, NamaPelapor, EmailPelapor, TanggalLaporan');
			$this->db->from('tbmasalah');
			$this->db->order_by('NoMasalah', 'DESC');
			$this->db->order_by('TanggalLaporan', 'DESC');
			return $query = $this->db->get()->result();
		}

		function incoming_problem_data(){
			$id = 1;
			$this->db->select('tbprogress.IdProgress, tbmasalah.IdMasalah, tbmasalah.NoMasalah, tbstatuslaporan.IdStatusLaporan, tbstatuslaporan.StatusLaporan, tbprogress.TanggalProgress, tbprogress.JamProgress');
			$this->db->from('tbprogress');
			$this->db->join('tbmasalah', 'tbmasalah.IdMasalah=tbprogress.IdMasalah', 'left');
			$this->db->join('tbstatuslaporan', 'tbstatuslaporan.IdStatusLaporan=tbprogress.IdStatusLaporan', 'left');
			$this->db->where('tbstatuslaporan.IdStatusLaporan',$id);
			$this->db->order_by('tbprogress.TanggalProgress', 'DESC');
			$this->db->order_by('tbprogress.JamProgress', 'DESC');
			return $this->db->get()->result();
		}

		function data_request(){
			$this->db->select('tbrequest.IdRequest, tbmasalah.IdMasalah, tbmasalah.NoMasalah, tbrequest.NamaRequest, tbrequest.DetailRequest');
			$this->db->from('tbrequest');
			$this->db->join('tbmasalah', 'tbmasalah.IdMasalah=tbrequest.IdMasalah', 'left');
			return $query = $this->db->get()->result();
		}

		function pending_problem_data(){
			$id = 2;
			$this->db->select('tbprogress.IdProgress, tbmasalah.IdMasalah, tbmasalah.NoMasalah, tbstatuslaporan.IdStatusLaporan, tbstatuslaporan.StatusLaporan, tbprogress.TanggalProgress, tbprogress.JamProgress');
			$this->db->from('tbprogress');
			$this->db->join('tbmasalah', 'tbmasalah.IdMasalah=tbprogress.IdMasalah', 'left');
			$this->db->join('tbstatuslaporan', 'tbstatuslaporan.IdStatusLaporan=tbprogress.IdStatusLaporan', 'left');
			$this->db->where('tbstatuslaporan.IdStatusLaporan',$id);
			return $this->db->get()->result();
		}

		function problem_data_in_progress(){
			$id = 3	;
			$this->db->select('tbprogress.IdProgress, tbmasalah.IdMasalah, tbmasalah.NoMasalah, tbstatuslaporan.StatusLaporan, tbprogress.TanggalProgress, tbprogress.JamProgress');
			$this->db->from('tbprogress');
			$this->db->join('tbmasalah', 'tbmasalah.IdMasalah=tbprogress.IdMasalah', 'left');
			$this->db->join('tbstatuslaporan', 'tbstatuslaporan.IdStatusLaporan=tbprogress.IdStatusLaporan', 'left');
			$this->db->where('tbstatuslaporan.IdStatusLaporan',$id);
			$this->db->order_by('tbprogress.TanggalProgress', 'DESC');
			$this->db->order_by('tbprogress.JamProgress', 'DESC');
			return $this->db->get()->result();
		}

		function complete_problem_data(){
			$id = 4	;
			$this->db->select('tbprogress.IdProgress, tbmasalah.IdMasalah, tbmasalah.NoMasalah, tbstatuslaporan.StatusLaporan, tbprogress.TanggalProgress, tbprogress.JamProgress');
			$this->db->from('tbprogress');
			$this->db->join('tbmasalah', 'tbmasalah.IdMasalah=tbprogress.IdMasalah', 'left');
			$this->db->join('tbstatuslaporan', 'tbstatuslaporan.IdStatusLaporan=tbprogress.IdStatusLaporan', 'left');
			$this->db->where('tbstatuslaporan.IdStatusLaporan',$id);
			$this->db->order_by('tbprogress.TanggalProgress', 'DESC');
			$this->db->order_by('tbprogress.JamProgress', 'DESC');
			return $query = $this->db->get()->result();
		}
	
	// End Show

}