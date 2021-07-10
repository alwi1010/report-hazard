<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminSystem extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->helper('url','html');
	
		if($this->session->userdata('status') != "login"){
			redirect(base_url("login-admin"));
		}
	}


	public function index(){
		$this->load->model('m_data');

		$data['incoming_data'] = $this->m_data->incoming_problem_data();
		$data['pending_data'] = $this->m_data->pending_problem_data();
		$data['data_in_progress'] = $this->m_data->problem_data_in_progress();
		$data['data_complete'] = $this->m_data->complete_problem_data();
		$data['history_data'] = $this->m_data->history_problem_data();
		$data['data_request'] = $this->m_data->data_request();

		$this->load->view('admin/dashboard', $data);
	}

	// Main Pages Start

		public function incoming_data(){
			$this->load->model('m_data');

			$this->load->view('admin/incoming_problem_data');
		}

	// Main Pages End

	// Start Detail Pages

		function details($token=NULL){
				echo "<pre>";
				print_r($token);
				echo "</pre>"; die();
			if (isset($token)):
				$encode = base64_decode($token);
				$pecah = explode("?", $encode);
	      $IdMasalah = $pecah[0];

				$data['incoming_data'] = $this->m_data->incoming_problem_data();
				$data['pending_data'] = $this->m_data->pending_problem_data();
				$data['data_in_progress'] = $this->m_data->problem_data_in_progress();
				$data['data_complete'] = $this->m_data->complete_problem_data();
				$data['history_data'] = $this->m_data->history_problem_data();
				$data['data_request'] = $this->m_data->data_request();

				$this->load->view('report_details', $data);
			else:
				$this->load->view('errors/html/error_403');
			endif;
		}

	// End Detail Pages

	// Lain Lain
		function logout(){
			$this->session->sess_destroy();
			redirect(base_url("login-admin"));
		}
}