<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('Essential');
		$this->load->library('session');
		
	}

	public function dashboard() {
		$data['site_name'] = $this->Essential->sitename();
		$data['favicon'] = base_url($this->Essential->favicon());
		$data['pages'] = $this->Essential->pages();
		$data['page'] = "Admin Dashboard";

		if ($this->session->userdata('loggedIn')) {
			
			$this->load->view('inc/head/head-type-3', $data);

		} else {
			redirect(base_url('user/login'));
		}
		
	}
}
