<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Site_settings extends CI_Model {

	public function system_name() {
		$this->db->where('a_name', 'site-name');
		$query = $this->db->get('application');
		$result = $query->row();
        return $result->a_value;
	}
	public function description() {
		$this->db->where('a_name', 'description');
		$query = $this->db->get('application');
		$result = $query->row();
        return $result->a_value;
	}

	public function phone_number() {
		$this->db->where('a_name', 'phone_number');
		$query = $this->db->get('application');
		$result = $query->row();
        return $result->a_value;
	}
	public function address() {
		$this->db->where('a_name', 'address');
		$query = $this->db->get('application');
		$result = $query->row();
        return $result->a_value;
	}
	public function system_email() {
		$this->db->where('a_name', 'system-email');
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
	public function systhumnail() {
		$this->db->where('a_name', 'post_thumbnail');
		$query = $this->db->get('application');
		$result = $query->row();
        return $result->a_value;
	}
	public function Cuserphoto() {
		$this->db->where('a_name', 'Cuserphoto');
		$query = $this->db->get('application');
		$result = $query->row();
        return $result->a_value;
	}
	public function smtp_host() {
		$this->db->where('a_name', 'smtp_host');
		$query = $this->db->get('application');
		$result = $query->row();
        return $result->a_value;
	}
	public function smtp_port() {
		$this->db->where('a_name', 'smtp_port');
		$query = $this->db->get('application');
		$result = $query->row();
        return $result->a_value;
	}
	public function user_name() {
		$this->db->where('a_name', 'smtp_user');
		$query = $this->db->get('application');
		$result = $query->row();
        return $result->a_value;
	}
	public function password() {
		$this->db->where('a_name', 'smtp_password');
		$query = $this->db->get('application');
		$result = $query->row();
        return $result->a_value;
	}
	public function telegramApi() {
		$this->db->where('a_name', 'telegramApi');
		$query = $this->db->get('application');
		$result = $query->row();
        return $result->a_value;
	}
	public function telegram_ChatId() {
		$this->db->where('a_name', 'telegram_ChatId');
		$query = $this->db->get('application');
		$result = $query->row();
        return $result->a_value;
	}
	public function upSitename($site_name) {
		$this->db->where('a_name', 'site-name');
		if ($this->db->update('application', array("a_value" => $site_name))) {
			return "success";
		} else {
			return "fail";
		}
	}
	public function updescription($description) {
		$this->db->where('a_name', 'description');
		if ($this->db->update('application', array("a_value" => $description))) {
			return "success";
		} else {
			return "fail";
		}
	}
	public function upPhonenumber($phone_number) {
		$this->db->where('a_name', 'phone_number');
		if ($this->db->update('application', array("a_value" => $phone_number))) {
			return "success";
		} else {
			return "fail";
		}
	}
	public function upAddress($address) {
		$this->db->where('a_name', 'address');
		if ($this->db->update('application', array("a_value" => $address))) {
			return "success";
		} else {
			return "fail";
		}
	}
	public function upEmail($email) {
		$this->db->where('a_name', 'system-email');
		if ($this->db->update('application', array("a_value" => $email))) {
			return "success";
		} else {
			return "fail";
		}
	}
	public function upSmtp_host($smtp_host) {
		$this->db->where('a_name', 'smtp_host');
		if ($this->db->update('application', array("a_value" => $smtp_host))) {
			return "success";
		} else {
			return "fail";
		}
	}
	public function upSmtp_port($smtp_port) {
		$this->db->where('a_name', 'smtp_port');
		if ($this->db->update('application', array("a_value" => $smtp_port))) {
			return "success";
		} else {
			return "fail";
		}
	}
	public function upSmtp_user($smtp_username) {
		$this->db->where('a_name', 'smtp_user');
		if ($this->db->update('application', array("a_value" => $smtp_username))) {
			return "success";
		} else {
			return "fail";
		}
	}
	public function upSmtp_password($smtp_password) {
		$this->db->where('a_name', 'smtp_password');
		if ($this->db->update('application', array("a_value" => $smtp_password))) {
			return "success";
		} else {
			return "fail";
		}
	}
	public function upTelegramtoken($apiToken) {
		$this->db->where('a_name', 'telegramApi');
		if ($this->db->update('application', array("a_value" => $apiToken))) {
			return "success";
		} else {
			return "fail";
		}
	}
	public function upTelegramchatid($TchatId) {
		$this->db->where('a_name', 'telegram_ChatId');
		if ($this->db->update('application', array("a_value" => $TchatId))) {
			return "success";
		} else {
			return "fail";
		}
	}
	public function upFavicon($encryptedNamef) {
		$this->db->where('a_name', 'favicon');
		if ($this->db->update('application', array("a_value" => "assets/uploads/".$encryptedNamef))) {
			return "success";
		} else {
			return "fail";
		}
	}
	public function upThumbnail($encryptedNameT) {
		$this->db->where('a_name', 'post_thumbnail');
		if ($this->db->update('application', array("a_value" => "assets/system/".$encryptedNameT))) {
			return "success";
		} else {
			return "fail";
		}
	}
	public function upCuserPhoto($encryptedNameC) {
		$this->db->where('a_name', 'Cuserphoto');
		if ($this->db->update('application', array("a_value" => $encryptedNameC))) {
			return "success";
		} else {
			return "fail";
		}
	}
	public function upPaypal($clientId) {
		$this->db->where('a_name', 'PClient_ID');
		if ($this->db->update('application', array("a_value" => $clientId))) {
			return "success";
		} else {
			return "fail";
		}
	}
}
