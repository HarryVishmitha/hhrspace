<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribe extends CI_Controller {

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
		$data['page'] = "Subscribe us";
		$data['userData'] = $this->Essential->userdata();

		if ($this->input->get('email')) {
			$data['email'] = $this->input->get('email');
			$subscriber = array(
				'email' => $this->input->get('email'),
				'fi_name' => 'Sir',
				'la_name' => 'Madam'
			);
			$this->db->insert('subscribers', $subscriber);
		} else {
			$data['email'] = 'NO';
		}
		

		$this->load->view('inc/head/head-type-1', $data);
		$this->load->view('subscribe', $data);
		$this->load->view('inc/footer/footer-type-1', $data);
	}

	public function add_subscriber() {
		$email = $this->input->post('email');
		$first_name = $this->input->post('first-name');
		$last_name = $this->input->post('last-name');

		$this->db->where('email', $email);
		$query = $this->db->get('subscribers');
		if ($query->num_rows() > 0) {
			$exists_subscriber = array(
				'fi_name' => $first_name,
				'la_name' => $last_name
			);
			$this->db->where('email', $email);
			$updating = $this->db->update('subscribers', $exists_subscriber);
			if ($updating) {
				echo "<div class='alert alert-success'><strong>Success!</strong> You are successfully subscribe us. We will be in touch with you shortly via email.</div>";
			} else {
				echo "<div class='alert alert-dangar'><strong>Sorry!</strong>Something gone wrong! Please try again later or contact admin.</div>";
			}
		} else {
			$new_subscriber = array(
				'email' => $email,
				'fi_name' => $first_name,
				'la_name' => $last_name
			);
			$adding = $this->db->insert('subscribers', $new_subscriber);
			if ($adding) {
				echo "<div class='alert alert-success'><strong>Success!</strong> You are successfully subscribe us. We will be in touch with you shortly via email.</div>";
			} else {
				echo "<div class='alert alert-dangar'><strong>Sorry!</strong>Something gone wrong! Please try again later or contact admin.</div>";
			}
			
		}
		
	}
	
}
