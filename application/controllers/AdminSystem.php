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
		$this->load->view('admin/dashboard');
	}

	// Lain Lain
		function logout(){
			$this->session->sess_destroy();
			redirect(base_url("login-admin"));
		}
}