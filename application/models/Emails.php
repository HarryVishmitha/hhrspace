<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Emails extends CI_Model {
	public function __construct() {
        parent::__construct();
        $this->load->database();
    }

	public function verification($Toemail) {
		$this->db->where('a_name', 'smtp_host');
		$query1 = $this->db->get('application');
		$result1 = $query1->row();
		$smtpHost = $result1->a_value;

		$this->db->where('a_name', 'smtp_auth');
		$query2 = $this->db->get('application');
		$result2 = $query2->row();
		$smtpAuth = $result2->a_value;

		$this->db->where('a_name', 'smtp_user');
		$query3 = $this->db->get('application');
		$result3 = $query3->row();
		$smtpUser = $result3->a_value;

		$this->db->where('a_name', 'smtp_password');
		$query4 = $this->db->get('application');
		$result4 = $query4->row();
		$smtpPass = $result4->a_value;

		$this->db->where('a_name', 'smtp_secure');
		$query5 = $this->db->get('application');
		$result5 = $query5->row();
		$smtpSecure = $result5->a_value;

		$this->db->where('a_name', 'smtp_port');
		$query6 = $this->db->get('application');
		$result6 = $query6->row();
		$smtpPort = $result6->a_value;

		$this->db->where('a_name', 'site-name');
		$query7 = $this->db->get('application');
		$result7 = $query7->row();
		$siteName = $result7->a_value;

		$this->db->where('a_name', 'system-email');
		$query8 = $this->db->get('application');
		$result8 = $query8->row();
		$systemEmail = $result8->a_value;

		$this->db->where('a_name', 'favicon');
		$query8 = $this->db->get('application');
		$result8 = $query8->row();
		$favicon = $result8->a_value;

		$this->db->where('email', $Toemail);
		$queryE = $this->db->get('verifications');
		$resultE = $queryE->row();
		$verificationCode = $resultE->code;

		$this->db->where('email', $Toemail);
		$queryN = $this->db->get('users');
		$resultN = $queryN->row();
		$fName = $resultN->first_name;
		$lName = $resultN->last_name;
		$userFullname = $fName . ' ' . $lName;
		
		$URL = base_url('user/confirm?email='.$Toemail);
		$lockPNG = base_url('assets/system/email-verification.png');

		$this->load->library('phpmailer_lib');
		$mail = $this->phpmailer_lib->load();
		// SMTP configuration
		$mail->isSMTP();
		$mail->Host     = $smtpHost;
		$mail->SMTPAuth = $smtpAuth;
		$mail->Username = $smtpUser;
		$mail->Password = $smtpPass;
		$mail->SMTPSecure = $smtpSecure;
		$mail->Port     = $smtpPort;
		 
		$mail->setFrom($systemEmail, $siteName);
		 
		// Add a recipient
		$mail->addAddress($Toemail);
		 
		// Email subject
		$mail->Subject = 'Verify your email address for ' . $siteName;
		 
		// Set email format to HTML
		$mail->isHTML(true);
		 
		// Email body content
		$mailContent = file_get_contents(APPPATH . 'views/emails/verification.php');
		$mailContent = str_replace('{verificationCode}', $verificationCode, $mailContent);
		$mailContent = str_replace('{Sitename}', $siteName, $mailContent);
		$mailContent = str_replace('{systemEmail}', $systemEmail, $mailContent);
		$mailContent = str_replace('{newUsername}', $userFullname, $mailContent);
		// $mailContent = str_replace('{LockPng}', $lockPNG, $mailContent);
		$mailContent = str_replace('{URL}', $URL, $mailContent);
		$mail->Body = $mailContent;
		 
		// Send email
		if(!$mail->send()){
			return '<script>$("#status").addClass("alert-success");$("#status").html("Message could not be sent. Mailer Error: ' . $mail->ErrorInfo . '");</script>';
		}else{
			return '<script>$("#status").addClass("alert-success");$("#status").html("Your confirmation email sent. Please check your inbox and you will redirect to verification page.");window.location.href = "'. base_url('user/confirm?email='. $Toemail) .'"</script>';
		}
	}
	public function commonAdmins($subject, $ebody) {
		//SMTP Server
		$this->db->where('a_name', 'smtp_host');
		$query1 = $this->db->get('application');
		$result1 = $query1->row();
		$smtpHost = $result1->a_value;

		//SMTP auth
		$this->db->where('a_name', 'smtp_auth');
		$query2 = $this->db->get('application');
		$result2 = $query2->row();
		$smtpAuth = $result2->a_value;

		//SMTP username
		$this->db->where('a_name', 'smtp_user');
		$query3 = $this->db->get('application');
		$result3 = $query3->row();
		$smtpUser = $result3->a_value;

		//SMTP password
		$this->db->where('a_name', 'smtp_password');
		$query4 = $this->db->get('application');
		$result4 = $query4->row();
		$smtpPass = $result4->a_value;

		//SMTP Secure
		$this->db->where('a_name', 'smtp_secure');
		$query5 = $this->db->get('application');
		$result5 = $query5->row();
		$smtpSecure = $result5->a_value;

		//SMTP port
		$this->db->where('a_name', 'smtp_port');
		$query6 = $this->db->get('application');
		$result6 = $query6->row();
		$smtpPort = $result6->a_value;

		//Site name
		$this->db->where('a_name', 'site-name');
		$query7 = $this->db->get('application');
		$result7 = $query7->row();
		$siteName = $result7->a_value;

		//Email address
		$this->db->where('a_name', 'system-email');
		$query8 = $this->db->get('application');
		$result8 = $query8->row();
		$systemEmail = $result8->a_value;

		//Favicon
		$this->db->where('a_name', 'favicon');
		$query8 = $this->db->get('application');
		$result8 = $query8->row();
		$favicon = $result8->a_value;

		//Get admins
		$this->db->where('type', 'admin');
		$queryAdmins = $this->db->get('users');
		$Admins = $queryAdmins->result();


		$this->load->library('phpmailer_lib');
		$mail = $this->phpmailer_lib->load();
		// SMTP configuration
		$mail->isSMTP();
		$mail->Host     = $smtpHost;
		$mail->SMTPAuth = $smtpAuth;
		$mail->Username = $smtpUser;
		$mail->Password = $smtpPass;
		$mail->SMTPSecure = $smtpSecure;
		$mail->Port     = $smtpPort;
		 
		$mail->setFrom($systemEmail, $siteName);
		 
		// Set email format to HTML
		$mail->isHTML(true);
		 
		// Email body content
		$mailContent = file_get_contents(APPPATH . 'views/emails/common.php');
		$mailContent = str_replace('{Sitename}', $siteName, $mailContent);
		$mailContent = str_replace('{systemEmail}', $systemEmail, $mailContent);
		$mailContent = str_replace('{message}', $ebody, $mailContent);
		$isFailure = false;
		//Looping
		foreach ($Admins as $Admins) {
			//Get email address
			$Toemail = $Admins->email;
			//Clear previous recipient addresses
			$mail->clearAddresses();
			// Add a recipient
			$mail->addAddress($Toemail);
			// Email subject
			$mail->Subject = $subject;
			//Set Admin's email address
			$userFullname = $Admins->first_name . ' ' . $Admins->last_name;
			$mailContent = str_replace('{username}', $userFullname, $mailContent);
			$mail->Body = $mailContent;

			// Send email
			if(!$mail->send()){
				$isFailure = true;
			}
		}
		$email_for_database = array(
			"e_subject" => $subject,
			"Ebody" => $ebody,
			"sent_to" => "Admins",
			"sent_user_id" => $this->session->userdata('UserId')
		);
		$this->db->insert('email_messages', $email_for_database);
		// Check the status and return the appropriate response
		if ($isFailure) {
			return 'Failed';
		} else {
			return 'success';
		}
		
	}
	public function commonAuthors($subject, $ebody) {
		//SMTP Server
		$this->db->where('a_name', 'smtp_host');
		$query1 = $this->db->get('application');
		$result1 = $query1->row();
		$smtpHost = $result1->a_value;

		//SMTP auth
		$this->db->where('a_name', 'smtp_auth');
		$query2 = $this->db->get('application');
		$result2 = $query2->row();
		$smtpAuth = $result2->a_value;

		//SMTP username
		$this->db->where('a_name', 'smtp_user');
		$query3 = $this->db->get('application');
		$result3 = $query3->row();
		$smtpUser = $result3->a_value;

		//SMTP password
		$this->db->where('a_name', 'smtp_password');
		$query4 = $this->db->get('application');
		$result4 = $query4->row();
		$smtpPass = $result4->a_value;

		//SMTP Secure
		$this->db->where('a_name', 'smtp_secure');
		$query5 = $this->db->get('application');
		$result5 = $query5->row();
		$smtpSecure = $result5->a_value;

		//SMTP port
		$this->db->where('a_name', 'smtp_port');
		$query6 = $this->db->get('application');
		$result6 = $query6->row();
		$smtpPort = $result6->a_value;

		//Site name
		$this->db->where('a_name', 'site-name');
		$query7 = $this->db->get('application');
		$result7 = $query7->row();
		$siteName = $result7->a_value;

		//Email address
		$this->db->where('a_name', 'system-email');
		$query8 = $this->db->get('application');
		$result8 = $query8->row();
		$systemEmail = $result8->a_value;

		//Favicon
		$this->db->where('a_name', 'favicon');
		$query8 = $this->db->get('application');
		$result8 = $query8->row();
		$favicon = $result8->a_value;

		//Get authors
		$this->db->where('type', 'author');
		$queryAdmins = $this->db->get('users');
		$Authors = $queryAdmins->result();


		$this->load->library('phpmailer_lib');
		$mail = $this->phpmailer_lib->load();
		// SMTP configuration
		$mail->isSMTP();
		$mail->Host     = $smtpHost;
		$mail->SMTPAuth = $smtpAuth;
		$mail->Username = $smtpUser;
		$mail->Password = $smtpPass;
		$mail->SMTPSecure = $smtpSecure;
		$mail->Port     = $smtpPort;
		 
		$mail->setFrom($systemEmail, $siteName);
		 
		// Set email format to HTML
		$mail->isHTML(true);
		 
		// Email body content
		$mailContent = file_get_contents(APPPATH . 'views/emails/common.php');
		$mailContent = str_replace('{Sitename}', $siteName, $mailContent);
		$mailContent = str_replace('{systemEmail}', $systemEmail, $mailContent);
		$mailContent = str_replace('{message}', $ebody, $mailContent);
		$isFailure = false;
		//Looping
		foreach ($Authors as $Admins) {
			//Get email address
			$Toemail = $Admins->email;
			//Clear previous recipient addresses
			$mail->clearAddresses();
			// Add a recipient
			$mail->addAddress($Toemail);
			// Email subject
			$mail->Subject = $subject;
			//Set Admin's email address
			$userFullname = $Admins->first_name . ' ' . $Admins->last_name;
			$mailContent = str_replace('{username}', $userFullname, $mailContent);
			$mail->Body = $mailContent;

			// Send email
			if(!$mail->send()){
				$isFailure = true;
			}
		}
		$email_for_database = array(
			"e_subject" => $subject,
			"Ebody" => $ebody,
			"sent_to" => "Authors",
			"sent_user_id" => $this->session->userdata('UserId')
		);
		$this->db->insert('email_messages', $email_for_database);
		// Check the status and return the appropriate response
		if ($isFailure) {
			return 'Failed';
		} else {
			return 'success';
		}
		
	}
	public function commonMembers($subject, $ebody) {
		//SMTP Server
		$this->db->where('a_name', 'smtp_host');
		$query1 = $this->db->get('application');
		$result1 = $query1->row();
		$smtpHost = $result1->a_value;

		//SMTP auth
		$this->db->where('a_name', 'smtp_auth');
		$query2 = $this->db->get('application');
		$result2 = $query2->row();
		$smtpAuth = $result2->a_value;

		//SMTP username
		$this->db->where('a_name', 'smtp_user');
		$query3 = $this->db->get('application');
		$result3 = $query3->row();
		$smtpUser = $result3->a_value;

		//SMTP password
		$this->db->where('a_name', 'smtp_password');
		$query4 = $this->db->get('application');
		$result4 = $query4->row();
		$smtpPass = $result4->a_value;

		//SMTP Secure
		$this->db->where('a_name', 'smtp_secure');
		$query5 = $this->db->get('application');
		$result5 = $query5->row();
		$smtpSecure = $result5->a_value;

		//SMTP port
		$this->db->where('a_name', 'smtp_port');
		$query6 = $this->db->get('application');
		$result6 = $query6->row();
		$smtpPort = $result6->a_value;

		//Site name
		$this->db->where('a_name', 'site-name');
		$query7 = $this->db->get('application');
		$result7 = $query7->row();
		$siteName = $result7->a_value;

		//Email address
		$this->db->where('a_name', 'system-email');
		$query8 = $this->db->get('application');
		$result8 = $query8->row();
		$systemEmail = $result8->a_value;

		//Favicon
		$this->db->where('a_name', 'favicon');
		$query8 = $this->db->get('application');
		$result8 = $query8->row();
		$favicon = $result8->a_value;

		//Get memberss	
		$this->db->where('type', 'user');
		$queryAdmins = $this->db->get('users');
		$Admins = $queryAdmins->result();


		$this->load->library('phpmailer_lib');
		$mail = $this->phpmailer_lib->load();
		// SMTP configuration
		$mail->isSMTP();
		$mail->Host     = $smtpHost;
		$mail->SMTPAuth = $smtpAuth;
		$mail->Username = $smtpUser;
		$mail->Password = $smtpPass;
		$mail->SMTPSecure = $smtpSecure;
		$mail->Port     = $smtpPort;
		 
		$mail->setFrom($systemEmail, $siteName);
		 
		// Set email format to HTML
		$mail->isHTML(true);
		 
		// Email body content
		$mailContent = file_get_contents(APPPATH . 'views/emails/common.php');
		$mailContent = str_replace('{Sitename}', $siteName, $mailContent);
		$mailContent = str_replace('{systemEmail}', $systemEmail, $mailContent);
		$mailContent = str_replace('{message}', $ebody, $mailContent);
		$isFailure = false;
		//Looping
		foreach ($Admins as $Admins) {
			//Get email address
			$Toemail = $Admins->email;
			//Clear previous recipient addresses
			$mail->clearAddresses();
			// Add a recipient
			$mail->addAddress($Toemail);
			// Email subject
			$mail->Subject = $subject;
			//Set Admin's email address
			$userFullname = $Admins->first_name . ' ' . $Admins->last_name;
			$mailContent = str_replace('{username}', $userFullname, $mailContent);
			$mail->Body = $mailContent;

			// Send email
			if(!$mail->send()){
				$isFailure = true;
			}
		}
		$email_for_database = array(
			"e_subject" => $subject,
			"Ebody" => $ebody,
			"sent_to" => "Members",
			"sent_user_id" => $this->session->userdata('UserId')
		);
		$this->db->insert('email_messages', $email_for_database);
		// Check the status and return the appropriate response
		if ($isFailure) {
			return 'Failed';
		} else {
			return 'success';
		}
		
	}
	public function commonSubscribers($subject, $ebody) {
		//SMTP Server
		$this->db->where('a_name', 'smtp_host');
		$query1 = $this->db->get('application');
		$result1 = $query1->row();
		$smtpHost = $result1->a_value;

		//SMTP auth
		$this->db->where('a_name', 'smtp_auth');
		$query2 = $this->db->get('application');
		$result2 = $query2->row();
		$smtpAuth = $result2->a_value;

		//SMTP username
		$this->db->where('a_name', 'smtp_user');
		$query3 = $this->db->get('application');
		$result3 = $query3->row();
		$smtpUser = $result3->a_value;

		//SMTP password
		$this->db->where('a_name', 'smtp_password');
		$query4 = $this->db->get('application');
		$result4 = $query4->row();
		$smtpPass = $result4->a_value;

		//SMTP Secure
		$this->db->where('a_name', 'smtp_secure');
		$query5 = $this->db->get('application');
		$result5 = $query5->row();
		$smtpSecure = $result5->a_value;

		//SMTP port
		$this->db->where('a_name', 'smtp_port');
		$query6 = $this->db->get('application');
		$result6 = $query6->row();
		$smtpPort = $result6->a_value;

		//Site name
		$this->db->where('a_name', 'site-name');
		$query7 = $this->db->get('application');
		$result7 = $query7->row();
		$siteName = $result7->a_value;

		//Email address
		$this->db->where('a_name', 'system-email');
		$query8 = $this->db->get('application');
		$result8 = $query8->row();
		$systemEmail = $result8->a_value;

		//Favicon
		$this->db->where('a_name', 'favicon');
		$query8 = $this->db->get('application');
		$result8 = $query8->row();
		$favicon = $result8->a_value;

		//Get subscribers
		$querysubs= $this->db->get('subscribers');
		$subscribers = $querysubs->result();


		$this->load->library('phpmailer_lib');
		$mail = $this->phpmailer_lib->load();
		// SMTP configuration
		$mail->isSMTP();
		$mail->Host     = $smtpHost;
		$mail->SMTPAuth = $smtpAuth;
		$mail->Username = $smtpUser;
		$mail->Password = $smtpPass;
		$mail->SMTPSecure = $smtpSecure;
		$mail->Port     = $smtpPort;
		 
		$mail->setFrom($systemEmail, $siteName);
		 
		// Set email format to HTML
		$mail->isHTML(true);
		 
		// Email body content
		$mailContent = file_get_contents(APPPATH . 'views/emails/common.php');
		$mailContent = str_replace('{Sitename}', $siteName, $mailContent);
		$mailContent = str_replace('{systemEmail}', $systemEmail, $mailContent);
		$mailContent = str_replace('{message}', $ebody, $mailContent);
		$isFailure = false;
		//Looping
		foreach ($subscribers as $subscribers) {
			//Get email address
			$Toemail = $subscribers->email;
			//Clear previous recipient addresses
			$mail->clearAddresses();
			// Add a recipient
			$mail->addAddress($Toemail);
			// Email subject
			$mail->Subject = $subject;
			//Set Admin's email address
			$userFullname = $subscribers->fi_name . ' ' . $subscribers->la_name;
			$mailContent = str_replace('{username}', $userFullname, $mailContent);
			$mail->Body = $mailContent;

			// Send email
			if(!$mail->send()){
				$isFailure = true;
			}
		}
		$email_for_database = array(
			"e_subject" => $subject,
			"Ebody" => $ebody,
			"sent_to" => "Subscribers",
			"sent_user_id" => $this->session->userdata('UserId')
		);
		$this->db->insert('email_messages', $email_for_database);
		// Check the status and return the appropriate response
		if ($isFailure) {
			return 'Failed';
		} else {
			return 'success';
		}
		
	}
	public function historyTotalRows() {
        return $this->db->count_all('email_messages'); // Assuming 'messages' is the name of your table
    }

    public function historygetMessages($limit, $offset) {
        $this->db->select('*');
        $this->db->from('email_messages');
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }
}
