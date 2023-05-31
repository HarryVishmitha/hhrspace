<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('Essential');
		$this->load->model('Site_settings');
		$this->load->model('Telegram');
		$this->load->library('session');
		
	}

	public function dashboard() {
		$data['site_name'] = $this->Essential->sitename();
		$data['favicon'] = base_url($this->Essential->favicon());
		$data['pages'] = $this->Essential->pages();
		
		$data['userData'] = $this->Essential->userdata();

		if ($this->session->userdata('loggedIn')) {
			
			if ($this->Essential->userdata()->type == "admin") {
				$data['page'] = "Admin Dashboard";
				$this->load->view('inc/head/head-type-3', $data);
				$this->load->view('inc/dashboard-nav', $data);
				$this->load->view('admin/dashboard', $data);
				$this->load->view('inc/footer/footer-type-2', $data);
			} else {
				$data['page'] = "401";
				$this->load->view('inc/head/head-type-1', $data);
				$this->load->view('errors/html/error_401', $data);
				$this->load->view('inc/footer/footer-type-1', $data);
			}

		} else {
			redirect(base_url('user/login'));
		}
		
	}

	public function setting() {
		$data['site_name'] = $this->Essential->sitename();
		$data['favicon'] = base_url($this->Essential->favicon());
		$data['pages'] = $this->Essential->pages();
		$data['userData'] = $this->Essential->userdata();
		$data['system_name'] = $this->Site_settings->system_name();
		$data['description'] = $this->Site_settings->description();
		$data['phone_number'] = $this->Site_settings->phone_number();
		$data['address'] = $this->Site_settings->address();
		$data['system_email'] = $this->Site_settings->system_email();
		$data['sysfavicon'] = $this->Site_settings->favicon();
		$data['systhumnail'] = $this->Site_settings->systhumnail();
		$data['Cuserphoto'] = $this->Site_settings->Cuserphoto();
		$data['smtp_host'] = $this->Site_settings->smtp_host();
		$data['smtp_port'] = $this->Site_settings->smtp_port();
		$data['smtp_user'] = $this->Site_settings->user_name();
		$data['smtp_password'] = $this->Site_settings->password();
		$data['telegramApi'] = $this->Site_settings->telegramApi();
		$data['telegram_ChatId'] = $this->Site_settings->telegram_ChatId();
		$data['clientID'] = $this->Essential->PaypalCId();

		if ($this->session->userdata('loggedIn')) {
			if ($this->Essential->userdata()->type == "admin") {
				$data['page'] = "System Settings";
				$this->load->view('inc/head/head-type-3', $data);
				$this->load->view('inc/dashboard-nav', $data);
				$this->load->view('admin/settings', $data);
				$this->load->view('inc/footer/footer-type-2', $data);
			} else {
				$data['page'] = "401";
				$this->load->view('inc/head/head-type-1', $data);
				$this->load->view('errors/html/error_401', $data);
				$this->load->view('inc/footer/footer-type-1', $data);
			}

		} else {
			redirect(base_url('user/login'));
		}
	}
	public function updateBasicsettings() {

		if ($this->session->userdata('loggedIn')) {
			$site_name = $this->input->post("web_name");
			$description = $this->input->post("description");
			$phone_number = $this->input->post("phone_number");
			$address = $this->input->post("address");
			$email = $this->input->post("email");

			$upSitename = $this->Site_settings->upSitename($site_name);
			$updescription = $this->Site_settings->updescription($description);
			$upPhonenumber = $this->Site_settings->upPhonenumber($phone_number);
			$upAddress = $this->Site_settings->upAddress($address);
			$upEmail = $this->Site_settings->upEmail($email);

			if ($upSitename !== "success" || $updescription !== "success" || $upPhonenumber !== "success" || $upAddress !== "success" || $upEmail !== "success") {
				echo "<script>$('#basic_status').removeClass(\"alert-success\");$('#basic_status').addClass(\"alert-danger\");$('#basic_status').html(\"<strong>Sorry!</strong> Something gone wrong!\")</script>";
			} else {
				echo "<script>$('#basic_status').removeClass(\"alert-danger\");$('#basic_status').addClass(\"alert-success\");$('#basic_status').html(\"<strong>Success!</strong> Successfully updated.\")</script>";
			}
			
		} else {
			redirect(base_url('user/login'));
		}
	}
	public function updateSmtp() {

		if ($this->session->userdata('loggedIn')) {
			$smtp_host = $this->input->post("server");
			$smtp_port = $this->input->post("port");
			$smtp_username = $this->input->post("userName");
			$smtp_password = $this->input->post("passWord");

			$upSmtphost = $this->Site_settings->upSmtp_host($smtp_host);
			$upSmtpport = $this->Site_settings->upSmtp_port($smtp_port);
			$upSmtpuser = $this->Site_settings->upSmtp_user($smtp_username);
			$upSmtppassword = $this->Site_settings->upSmtp_password($smtp_password);

			if ($upSmtphost !== "success" || $upSmtpport !== "success" || $upSmtpuser !== "success" || $upSmtppassword !== "success") {
				echo "<script>$('#smtp_status').removeClass(\"alert-success\");$('#smtp_status').addClass(\"alert-danger\");$('#smtp_status').html(\"<strong>Sorry!</strong> Something gone wrong!\")</script>";
			} else {
				echo "<script>$('#smtp_status').removeClass(\"alert-danger\");$('#smtp_status').addClass(\"alert-success\");$('#smtp_status').html(\"<strong>Success!</strong> Successfully updated.\")</script>";
			}
			
		} else {
			redirect(base_url('user/login'));
		}
	}
	public function updateTelegram() {
		if ($this->session->userdata('loggedIn')) {

			$apiToken = $this->input->post("api");
			$TchatId = $this->input->post("chatId");

			$upApiToken = $this->Site_settings->upTelegramtoken($apiToken);
			$upChatId = $this->Site_settings->upTelegramchatid($TchatId);

			if ($upApiToken !== "success" || $upChatId !== "success") {
				echo "<script>$('#telegram_status').removeClass(\"alert-success\");$('#telegram_status').addClass(\"alert-danger\");$('#telegram_status').html(\"<strong>Sorry!</strong> Something gone wrong!\")</script>";
			} else {
				echo "<script>$('#telegram_status').removeClass(\"alert-danger\");$('#telegram_status').addClass(\"alert-success\");$('#telegram_status').html(\"<strong>Success!</strong> Successfully updated.\")</script>";
			}
			
		} else {
			redirect(base_url('user/login'));
		}
	}
	public function updatefavicon() {
		if ($this->session->userdata('loggedIn')) {
			$config['upload_path'] = './assets/uploads/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['encrypt_name'] = TRUE;
			$config['max_size'] =2048;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('userfile')) {
				$encryptedNamef = $this->upload->data('file_name');
				$upfavicon = $this->Site_settings->upFavicon($encryptedNamef);
				if ($upfavicon !== "success") {
					echo "<script>$('#favicon_status').removeClass(\"alert-success\");$('#favicon_status').addClass(\"alert-danger\");$('#favicon_status').html(\"<strong>Sorry!</strong> Something gone wrong!\")</script>";
				} else {
					echo "<script>$('#favicon_status').removeClass(\"alert-danger\");$('#favicon_status').addClass(\"alert-success\");$('#favicon_status').html(\"<strong>Success!</strong> Successfully uploaded and updated.\")</script>";
				}
				
			}else{
				$error = $this->upload->display_errors();
        		echo "<script>$('#favicon_status').removeClass(\"alert-success\");$('#favicon_status').addClass(\"alert-danger\");$('#favicon_status').html(\"<strong>Error:</strong> ". $error ."\")</script>";
			}

		} else {
			redirect(base_url('user/login'));
		}
	}
	public function updatepThumbnail() {
		if ($this->session->userdata('loggedIn')) {
			$config['upload_path'] = './assets/system/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['encrypt_name'] = TRUE;
			$config['max_size'] =2048;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('userfileT')) {
				$encryptedNameT = $this->upload->data('file_name');
				$upThumbnail = $this->Site_settings->upThumbnail($encryptedNameT);
				if ($upThumbnail !== "success") {
					echo "<script>$('#thumbnail_status').removeClass(\"alert-success\");$('#thumbnail_status').addClass(\"alert-danger\");$('#thumbnail_status').html(\"<strong>Sorry!</strong> Something gone wrong!\")</script>";
				} else {
					echo "<script>$('#thumbnail_status').removeClass(\"alert-danger\");$('#thumbnail_status').addClass(\"alert-success\");$('#thumbnail_status').html(\"<strong>Success!</strong> Successfully uploaded and updated.\")</script>";
				}
				
			}else{
				$error = $this->upload->display_errors();
        		echo "<script>$('#thumbnail_status').removeClass(\"alert-success\");$('#thumbnail_status').addClass(\"alert-danger\");$('#thumbnail_status').html(\"<strong>Error:</strong> ". $error ."\")</script>";
			}

		} else {
			redirect(base_url('user/login'));
		}
	}
	public function updateCuserphoto() {
		if ($this->session->userdata('loggedIn')) {
			$config['upload_path'] = './assets/uploads/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['encrypt_name'] = TRUE;
			$config['max_size'] =2048;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('userfileC')) {
				$encryptedNameC = $this->upload->data('file_name');
				$upCuserPhoto = $this->Site_settings->upCuserPhoto($encryptedNameC);
				if ($upCuserPhoto !== "success") {
					echo "<script>$('#cuserPhoto_status').removeClass(\"alert-success\");$('#cuserPhoto_status').addClass(\"alert-danger\");$('#cuserPhoto_status').html(\"<strong>Sorry!</strong> Something gone wrong!\")</script>";
				} else {
					echo "<script>$('#cuserPhoto_status').removeClass(\"alert-danger\");$('#cuserPhoto_status').addClass(\"alert-success\");$('#cuserPhoto_status').html(\"<strong>Success!</strong> Successfully uploaded and updated.\")</script>";
				}
				
			}else{
				$error = $this->upload->display_errors();
        		echo "<script>$('#cuserPhoto_status').removeClass(\"alert-success\");$('#cuserPhoto_status').addClass(\"alert-danger\");$('#cuserPhoto_status').html(\"<strong>Error:</strong> ". $error ."\")</script>";
			}

		} else {
			redirect(base_url('user/login'));
		}
	}
	public function updatepaymentPaypal() {
		if ($this->session->userdata('loggedIn')) {
			$clientId = $this->input->post('clientId');
			$uppayment = $this->Site_settings->upPaypal($clientId);
			if ($uppayment !== "success") {
				echo "<script>$('#paypal_status').removeClass(\"alert-success\");$('#paypal_status').addClass(\"alert-danger\");$('#paypal_status').html(\"<strong>Sorry!</strong> Something gone wrong!\")</script>";
			} else {
				echo "<script>$('#paypal_status').removeClass(\"alert-danger\");$('#paypal_status').addClass(\"alert-success\");$('#paypal_status').html(\"<strong>Success!</strong> Successfully uploaded and updated.\")</script>";
			}
		} else {
			redirect(base_url('user/login'));
		}
	}

	//Notifications
	public function notification() {
		$data['site_name'] = $this->Essential->sitename();
		$data['favicon'] = base_url($this->Essential->favicon());
		$data['pages'] = $this->Essential->pages();
		$data['page'] = "Send Notifications";
		$data['userData'] = $this->Essential->userdata();

		if ($this->session->userdata('loggedIn')) {
			if ($this->Essential->userdata()->type == "admin") {
				$data['page'] = "Send Notifications";
				$this->load->view('inc/head/head-type-3', $data);
				$this->load->view('inc/dashboard-nav', $data);
				$this->load->view('admin/notifications', $data);
				$this->load->view('inc/footer/footer-type-2', $data);
			} else {
				$data['page'] = "401";
				$this->load->view('inc/head/head-type-1', $data);
				$this->load->view('errors/html/error_401', $data);
				$this->load->view('inc/footer/footer-type-1', $data);
			}

		} else {
			redirect(base_url('user/login'));
		}
	}
	public function sendemailNotifi() {
		if ($this->session->userdata('loggedIn')) {
			$subject = $this->input->post('subject');
			$ebody = $this->input->post('Ebody');
			$admins = $this->input->post('admin');
			$authors = $this->input->post('author');
			$memberes = $this->input->post('member');
			$subscribers = $this->input->post('subscriber');
			$this->load->model('Emails');
			if ($admins == "admins") {
				$AdminStatus = $this->Emails->commonAdmins($subject, $ebody);
			} else {
				$AdminStatus = "success";
			}
			if ($authors == "authors") {
				$AuthorStatus = $this->Emails->commonAuthors($subject, $ebody);
			} else {
				$AuthorStatus = "success";
			}
			if ($memberes == "members") {
				$MemberStatus = $this->Emails->commonMembers($subject, $ebody);
			} else {
				$MemberStatus = "success";
			}
			if ($subscribers == "subscribers") {
				$SubscriberStatus = $this->Emails->commonSubscribers($subject, $ebody);
			} else {
				$SubscriberStatus = "success";
			}

			if ($AdminStatus !== "success" || $AuthorStatus !== "success" || $MemberStatus !== "success" || $SubscriberStatus !== "success") {
				echo '<script>$("#emailnotifi_status").removeClass("alert-success");$("#emailnotifi_status").addClass("alert-danger");';
				echo '$("#emailnotifi_status").html("Failed to sending some emails. Please try again later and Double check your smtp details.");';
				echo '</script>';
			} else {
				echo '<script>$("#emailnotifi_status").removeClass("alert-danger");$("#emailnotifi_status").addClass("alert-success");$("#emailnotifi_status").html("All emails sent");</script>';
			}
		} else {
			redirect(base_url('user/login'));
		}
		
	}
	public function sendImageTele() {
		if ($this->session->userdata('loggedIn')) {
			$ImageUrl = $this->input->post('Imageurl');
			$caption = $this->input->post('captiont');
			$chatId = $this->Site_settings->telegram_ChatId();
			$botToken = $this->Site_settings->telegramApi();
			echo $this->Telegram->sendPhoto($botToken, $chatId, $ImageUrl, $caption);
		} else {
			redirect(base_url('user/login'));
		}
	}
	public function sendTmsg() {
		if ($this->session->userdata('loggedIn')) {
			$chatId = $this->Site_settings->telegram_ChatId();
			$botToken = $this->Site_settings->telegramApi();
			$message = $this->input->post('messageT');

			echo $this->Telegram->send($botToken, $chatId, $message);
		} else {
			redirect(base_url('user/login'));
		}
	}
	public function sendPollTele() {
		if ($this->session->userdata('loggedIn')) {
			$chatId = $this->Site_settings->telegram_ChatId();
			$botToken = $this->Site_settings->telegramApi();
			$question = $this->input->post('question');
			$op1 = $this->input->post('option1');
			$op2 = $this->input->post('option2');
			$op3 = $this->input->post('option3');
			$op4 = $this->input->post('option4');
			$op5 = $this->input->post('option5');

			$options = array();
			if (!empty($op1)) {
				$options[] = $op1;
			}
			if (!empty($op2)) {
				$options[] = $op2;
			}
			if (!empty($op3)) {
				$options[] = $op3;
			}
			if (!empty($op4)) {
				$options[] = $op4;
			}
			if (!empty($op5)) {
				$options[] = $op5;
			}
			$optionsJson = json_encode($options);
			echo $this->Telegram->sendPoll($botToken, $chatId, $question, $optionsJson);
		} else {
			redirect(base_url('user/login'));
		}
	}
	public function history_telegrams($page = 1) {
		if ($this->session->userdata('loggedIn')) {
			$data['site_name'] = $this->Essential->sitename();
			$data['favicon'] = base_url($this->Essential->favicon());
			$data['pages'] = $this->Essential->pages();
			$data['userData'] = $this->Essential->userdata();
			$data['currentPageNum'] = $page;
			$limit = 10;
			$offset = ($page - 1) * $limit;
			$total_rows = $this->Telegram->historyTotalRows();
			$data['messages'] = $this->Telegram->historygetMessages($limit, $offset);
			$data['total_pages'] = ceil($total_rows / $limit);
			if ($this->Essential->userdata()->type == "admin") {
				$data['page'] = "History | Telegram messages";
				$this->load->view('inc/head/head-type-2', $data);
				$this->load->view('admin/history/telegram', $data);
				$this->load->view('inc/footer/footer-type-2', $data);
			} else {
				$data['page'] = "401";
				$this->load->view('inc/head/head-type-1', $data);
				$this->load->view('errors/html/error_401', $data);
				$this->load->view('inc/footer/footer-type-1', $data);
			}
		} else {
			redirect(base_url('user/login'));
		}
	}
	public function history_emails($page = 1) {
		$this->load->model('Emails');
		$data['site_name'] = $this->Essential->sitename();
		$data['favicon'] = base_url($this->Essential->favicon());
		$data['pages'] = $this->Essential->pages();
		$data['userData'] = $this->Essential->userdata();
		$data['currentPageNum'] = $page;
		$limit = 10;
        $offset = ($page - 1) * $limit;
        $total_rows = $this->Emails->historyTotalRows();
        $data['messages'] = $this->Emails->historygetMessages($limit, $offset);
        $data['total_pages'] = ceil($total_rows / $limit);
		if ($this->Essential->userdata()->type == "admin") {
			$data['page'] = "History | Emails";
			$this->load->view('inc/head/head-type-2', $data);
			$this->load->view('admin/history/emails', $data);
			$this->load->view('inc/footer/footer-type-2', $data);
		} else {
			$data['page'] = "401";
			$this->load->view('inc/head/head-type-1', $data);
			$this->load->view('errors/html/error_401', $data);
			$this->load->view('inc/footer/footer-type-1', $data);
		}
	}
	public function premium($page = 1) {
		if ($this->session->userdata('loggedIn')) {
			$this->load->model('Emails');
			$data['site_name'] = $this->Essential->sitename();
			$data['favicon'] = base_url($this->Essential->favicon());
			$data['pages'] = $this->Essential->pages();
			$data['userData'] = $this->Essential->userdata();
			$data['currentPageNum'] = $page;
			$limit = 10;
			$offset = ($page - 1) * $limit;
			$total_rows = $this->Essential->pctotalrows();
			$data['messages'] = $this->Essential->premium_content($limit, $offset);
			$data['total_pages'] = ceil($total_rows / $limit);
			$this->load->model('Premium_content');
			if ($this->Essential->userdata()->type == "admin") {
				$data['page'] = "Premium content";
				$this->load->view('inc/head/head-type-3', $data);
				$this->load->view('inc/dashboard-nav', $data);
				$this->load->view('admin/premium_content', $data);
				$this->load->view('inc/footer/footer-type-2', $data);
			} else {
				$data['page'] = "401";
				$this->load->view('inc/head/head-type-1', $data);
				$this->load->view('errors/html/error_401', $data);
				$this->load->view('inc/footer/footer-type-1', $data);
			}
		} else {
			redirect(base_url('user/login'));
		}
	}

}
