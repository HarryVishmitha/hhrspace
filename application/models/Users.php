<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Model {
	public function get_Ausers() {
		$query = $this->db->get('users');
		$result = $query->result();
		return $result;
	}
}
