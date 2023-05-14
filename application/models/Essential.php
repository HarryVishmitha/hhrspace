<?php
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
}
