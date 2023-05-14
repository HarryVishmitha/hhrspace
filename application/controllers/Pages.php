<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('Essential');
	}

	public function page($p) {
		$data['site_name'] = $this->Essential->sitename();
		$data['favicon'] = base_url($this->Essential->favicon());
		$data['pages'] = $this->Essential->pages();

		$this->db->where('page_url', $p);
		$query = $this->db->get('pages');
		$row = $query->row();
		$data['page'] = $row->page_name;

		$this->load->view('inc/head/head-type-1', $data);
		
		$this->load->view('inc/footer/footer-type-1', $data);
	}
}
