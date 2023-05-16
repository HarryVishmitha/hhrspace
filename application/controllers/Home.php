<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('Essential');
		$this->load->library('session');
	}

	public function index() {

		$data['site_name'] = $this->Essential->sitename();
		$data['favicon'] = base_url($this->Essential->favicon());
		$data['pages'] = $this->Essential->pages();
		$data['page'] = "Home";
		
		

		$this->load->view('inc/head/head-type-1', $data);
		$this->load->view('home', $data);
		$this->load->view('inc/footer/footer-type-1', $data);
	}

	public function termsconditions() {
		echo 'hi';

	}
}
