<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Essential extends CI_Model {

    public function sitename() {
		$this->db->where('a_name', 'site-name');
		$query = $this->db->get('application');
		$result = $query->row();
        return $result->a_value;
    }

	public function favicon() {
		$this->db->where('a_name', 'favicon');
		$query = $this->db->get('application');
		$result = $query->row();
        return $result->a_value;
	}

	public function pages() {
		$query = $this->db->get('pages');
		$result = $query->result();
		return $result;
	}

	public function userdata() {
		$this->db->where('id', $this->session->userdata('UserId'));
		$query = $this->db->get('users');
		$result = $query->row();
        return $result;
	}
	public function imgsummernote($encryptedName) {
		$photo = array(
			'url' => "assets/uploads/". $encryptedName
		);
		if ($this->db->insert('photos', $photo)) {
			return "success";
		} else {
			return "fail";
		}
	}
	public function photosSum() {
		$query = $this->db->get('photos');
		$result = $query->result();
		return $result;
	}
	public function PaypalCId() {
		$this->db->where('a_name', 'PClient_ID');
		$query = $this->db->get('application');
		$result = $query->row();
        return $result->a_value;
	}
	public function pctotalrows() {
		return $this->db->count_all('premium_content');
	}
	public function premium_content($limit, $offset) {
		$this->db->select('*');
        $this->db->from('premium_content');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
	}
}
