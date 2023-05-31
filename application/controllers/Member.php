<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('Essential');
		$this->load->library('session');
		
	}

	public function dashboard() {
		$data['userData'] = $this->Essential->userdata();

		if ($this->session->userdata('loggedIn')) {
		 	echo "User Dashboard" . $this->session->userdata('UserId');
		} else {
		 	redirect(base_url('user/login'));
		}
		
	}
}
