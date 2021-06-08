<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginAdminSystem extends CI_Controller{

	function __construct(){
		parent::__construct();
		$this->load->model('m_data');
		$this->load->helper('url','html');
	
		if($this->session->userdata('status')==="login"){
			redirect(base_url("laporan"));
		}
	}


	public function index(){
		$this->load->view('admin/login_admin');
	}
}