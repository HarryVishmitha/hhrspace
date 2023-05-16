<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('Essential');
		$this->load->library('session');
		
	}

	public function register() {
		$data['site_name'] = $this->Essential->sitename();
		$data['favicon'] = base_url($this->Essential->favicon());
		$data['pages'] = $this->Essential->pages();
		$data['page'] = "Sign up";

		if ($this->session->userdata('loggedIn')) {
			$userId = $this->session->userdata('UserId');
			$this->db->where('id', $userId);
			$query = $this->db->get('users');
			$row = $query->row();
			if ($row->type == "admin") {
				
				redirect(base_url('admin/dashboard'));

			} elseif ($row->type == "author") {
				
				redirect(base_url('author/dashboard'));

			} elseif ($row->type == "user") {
				
				redirect(base_url('user/dashboard'));
			}

		} else {
			$this->load->view('inc/head/head-type-2', $data);
			$this->load->view('sign-up', $data);
			$this->load->view('inc/footer/footer-type-2', $data);
		}
		
	}

	public function login() {
		$data['site_name'] = $this->Essential->sitename();
		$data['favicon'] = base_url($this->Essential->favicon());
		$data['pages'] = $this->Essential->pages();
		$data['page'] = "Sign in";

		if ($this->session->userdata('loggedIn')) {
			$userId = $this->session->userdata('UserId');
			$this->db->where('id', $userId);
			$query = $this->db->get('users');
			$row = $query->row();
			if ($row->type == "admin") {
				
				redirect(base_url('admin/dashboard'));

			} elseif ($row->type == "author") {
				
				redirect(base_url('author/dashboard'));

			} elseif ($row->type == "user") {
				
				redirect(base_url('user/dashboard'));
			}

		} else {
			$error = $this->input->get('error');
			if ($error == 'pass') {
				$data['error_message'] = 'Invalid password!';
			} else {
				$data['error_message'] = '';
			}

			$this->load->view('inc/head/head-type-2', $data);
			$this->load->view('sign-in', $data);
			$this->load->view('inc/footer/footer-type-2', $data);
		}
	}

	public function user_reg() {
		$firstName = $this->input->post('first-name');
		$lastName = $this->input->post('last-name');
		$email = $this->input->post('email');
		$newP = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
		$conP = $this->input->post('confirm_pass');
		$verify = str_pad(rand(100000, 999999), 6, "0", STR_PAD_LEFT);

		//Check email already exists
		$this->db->where('email', $email);
		$query = $this->db->get('users');

		if ($query->num_rows() > 0) {
			$this->db->where('email', $email);
			$queryKn = $this->db->get('users');
			$resultKn = $queryKn->row();
			
			if ($resultKn->verification == "Not-verified") {
				echo "<script>$('#email').addClass('is-invalid');$('#email-error').html('Email already exists.');$('#status').addClass('alert-danger');$('#status').html('This email already exists! <a href=\"". base_url('user/confirm?email='. $email) ."\" class=\"text-decoration-none\">Verify Email</a>');</script>";
			} elseif ($resultKn->verification == "verified") {
				echo "<script>$('#email').addClass('is-invalid');$('#email-error').html('Email already exists.');$('#status').addClass('alert-danger');$('#status').html('This email already exists! <a href=\"". base_url('user/login') ."\" class=\"text-decoration-none\">Sign in</a>');</script>";
			}
		} else {
			//check passwords
			if (password_verify($conP, $newP)) {
				$new_user = array(
					"first_name" => $firstName,
					"last_name" => $lastName,
					"email" => $email,
					"password" => $newP,
					"verification" => "Not-verified",
					"type" => "user",
					"dp" => "user.png"
				);
				if ($this->db->insert('users', $new_user)) {

					$this->db->where('email', $email);
					$queryy = $this->db->get('verifications');

					if ($queryy->num_rows() < 0) {

						$verificatioin_data = array(
							"email" => $email,
							"code" => $verify,
							"used" =>"0",
							"expiration_time" => time() + 3600
						);
						if ($this->db->insert('verifications', $verificatioin_data)) {

							$Toemail = $email;
							$this->load->model('Emails');
							echo $this->Emails->verification($Toemail);

						} else {

						echo "<script>console.log('Email verification data not store in database.');</script>";
						
						}
					} else {
						$verificatioin_dataO = array(
							"code" => $verify,
							"used" =>"0",
							"expiration_time" => time() + 3600
						);

						$this->db->where('email', $email);
						if ($this->db->update('verifications', $verificatioin_dataO)) {
							$Toemail = $email;
							$this->load->model('Emails');
							echo $this->Emails->verification($Toemail);
						} else {

							echo "<script>console.log('Email verification data not store in database.');</script>";
							
						}
					}
				} else {
					echo "<script>$('#status').addClass('alert-danger');$('#status').html('<strong>Sorry!</strong> Please try again later.');console.log('Can't insert data to database');</script>";
				}
				
			} else {
				echo "<script>$('#status').addClass('alert-danger');$('#status').html('Password doesn\'t match');console.log('Password mismatched');</script>";
			}
			
		}
		
	}

	public function confirm() {
		$data['site_name'] = $this->Essential->sitename();
		$data['favicon'] = base_url($this->Essential->favicon());
		$data['pages'] = $this->Essential->pages();
		$data['page'] = "Veriy Your email address";
		$data['emailAddress'] = $this->input->get('email');


		$this->load->view('inc/head/head-type-1', $data);
		$this->load->view('inc/email-verify', $data);
		$this->load->view('inc/footer/footer-type-1', $data);
	}

	public function gene_new_otp() {
		$Toemail = $this->input->post("email");
		$verify = str_pad(rand(100000, 999999), 6, "0", STR_PAD_LEFT);

		$this->db->where('email', $Toemail);
		$query = $this->db->get('users');
		$result = $query->row();
		$checkV = $result->verification;

		if ($checkV == "verified") {
			 echo "<script>$('#status').addClass('alert-info');$('#status').html('Your email already verified. Please login to your account. If you have any problem contact us.');</script>";
		} else if ($checkV == "Not-verified") {
			
			$verificatioin_data1 = array(
				"code" => $verify,
				"used" =>"0",
				"expiration_time" => time() + 3600
			);
			$this->db->where('email', $Toemail);
			if ($this->db->update('verifications', $verificatioin_data1)) {

				$this->load->model('Emails');
				echo $this->Emails->verification($Toemail);

			} else {

				echo "<script>$('#status').addClass('alert-danger');$('#status').html('<strong>Sorry!</strong> Something went wrong. Please try again later.');</script>";
			}
		}
	}

	public function verify_email() {
		$otp = $this->input->post('otp');
		$email = $this->input->post('email');

		$this->db->where('email', $email);
		$query = $this->db->get('users');
		$result = $query->row();
		$checkV = $result->verification;

		$this->db->where('email', $email);
		$query1 = $this->db->get('verifications');
		$result1 = $query1->row();
		$checkU = $result1->used;

		$this->db->where('email', $email);
		$query2 = $this->db->get('verifications');
		$result2 = $query2->row();
		$checkT = $result2->expiration_time;

		$this->db->where('email', $email);
		$query2 = $this->db->get('verifications');
		$result2 = $query2->row();
		$checkO = $result2->code;

		if ($checkV === 'Not-verified') {

			if ($checkT > time()) {
				
				if ($checkU == 0) {
					
					if ($checkO == $otp) {
						
						$dUser = array(
							"verification" => "verified"
						);
						$this->db->where('email', $email);
						$userUpdate = $this->db->update('users', $dUser);
						$dVeri = array(
							"used" => "1"
						);
						$this->db->where('email', $email);
						$updateVerifications = $this->db->update('verifications', $dVeri);
						if ($updateVerifications) {
							echo "<script>window.location.href = '". base_url("user/login") ."'; $('#status').addClass('alert-success');$('#status').html('<strong>Success!</strong> Your email is verified. You will redirect to login page ". time()."');</script>";
						} else {
							echo "<script>console.log('Error with database updating'); $('#status').addClass('alert-danger');$('#status').html('<strong>Sorry!</strong> Something gone wrong with database. Contact admin')</script>";
						}
					} else {
						echo "<script>console.log('otp not matched');$('#status').addClass('alert-danger');$('#status').html('<strong>Sorry!</strong> This isn\'t your verification code. Please try again');</script>";
					}
					

				} else {
					echo "<script>$('#status').addClass('alert-danger');$('#status').html('<strong>Sorry!</strong> Your verification code was used.');</script>";
				}
				

			} else {
				echo "<script>$('#status').addClass('alert-danger');$('#status').html('<strong>Sorry!</strong> Your verification code is expried. Please request new verification code.". time() ."');</script>";
			}
			
		} else {
			echo  "<script>$('#status').addClass('alert-danger');$('#status').html('Your email already verified. Please login to your account');</script>";
		}
		
	}

	public function auth() {
		$email = $this->input->post("email");
		$password = $this->input->post("password");

		$this->db->where('email', $email);
		$queryUse = $this->db->get('users');

		if ($queryUse->num_rows()) {
			$this->db->where('email', $email);
			$query = $this->db->get('users');
			$result = $query->row();
			if ($result->verification == "verified") {
				$this->db->where('email', $email);
				$query = $this->db->get('users');
				$result = $query->row();

				if (password_verify($password, $result->password)) {
					$this->db->where('email', $email);
					$query12345 = $this->db->get('users');
					$resultUser = $query12345->row();
					if ($resultUser->type == "admin") {
						$sessionData = array("UserId" => $resultUser->id, "loggedIn" => TRUE);
						$this->session->set_userdata($sessionData);
						redirect(base_url('admin/dashboard'));

					} elseif ($resultUser->type == "author") {
						$sessionData = array("UserId" => $resultUser->id, "loggedIn" => TRUE);
						$this->session->set_userdata($sessionData);
						redirect(base_url('author/dashboard'));

					} elseif ($resultUser->type == "user") {
						$sessionData = array("UserId" => $resultUser->id, "loggedIn" => TRUE);
						$this->session->set_userdata($sessionData);
						redirect(base_url('user/dashboard'));
					}
					
				} else {
					redirect('user/login?error=pass');
				}
			} else {
				redirect(base_url('user/confirm?email='. $email));
			}
			
		} else {
			$data['site_name'] = $this->Essential->sitename();
			$data['favicon'] = base_url($this->Essential->favicon());
			$data['pages'] = $this->Essential->pages();
			$data['page'] = "Authentication Error | Must sign up";
			$this->load->view('inc/head/head-type-1', $data);
			$this->load->view('errors/html/error_auth', $data);
			$this->load->view('inc/footer/footer-type-1', $data);
		}
		
		
		
	}

	public function logout() {
		// Destroy the session and redirect to login page
		$this->session->sess_destroy();
		$this->session->unset_userdata('loggedIn');
		redirect(base_url('home'));
	}

	public function dashboard() {

		if ($this->session->userdata('loggedIn')) {
			echo "User Dashboard" . $this->session->userdata('UserId');
		} else {
			redirect(base_url('user/login'));
		}
		
	}

}
