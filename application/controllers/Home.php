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
		$data['userData'] = $this->Essential->userdata();
		
		

		$this->load->view('inc/head/head-type-1', $data);
		$this->load->view('home', $data);
		$this->load->view('inc/footer/footer-type-1', $data);
	}

	public function termsconditions() {
		echo 'hi';

	}
	public function test() {
		$this->load->view('test');
	}
	public function create_payment() {
		$data['clientID'] = $this->Essential->PaypalCId();
		$this->load->view('payment', $data);
	}
	public function upload_file() {
		$config['upload_path'] = './assets/premium_contents/'; // Specify your upload directory
		$config['allowed_types'] = '*';
		$this->load->library('upload', $config);
	
		if ($this->upload->do_upload('userfile')) {
		  // File uploaded successfully
		  // Additional processing if needed
		  $response = 'File uploaded successfully.';
		} else {
		  // File upload failed
		  $response = 'Error uploading file: ' . $this->upload->display_errors();
		}
	
		echo $response;
	  }
}
