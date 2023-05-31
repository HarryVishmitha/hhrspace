<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Premium_content extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
	}
	public function pc_id_generator() {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charLength = strlen($characters);
		$randomString = '';
		$length = 10;
	
		do {
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charLength - 1)];
			}
			$this->db->where('pc_id', $randomString);
			$query = $this->db->get('premium_content');
		} while ($query->num_rows() > 0);
	
		return $randomString;
	}
	
}
