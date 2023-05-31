<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->helper('url');
		$this->load->database();
		$this->load->model('Essential');
		$this->load->library('session');
	}

	public function uploadPhotoSum() {
		if ($this->session->userdata('loggedIn')) {
			$config['upload_path'] = './assets/uploads/';
			$config['allowed_types'] = 'jpg|jpeg|png|gif';
			$config['encrypt_name'] = TRUE;
			$config['max_size'] =2048;
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('uploadPhotoSum')) {
				$encryptedName = $this->upload->data('file_name');
				$upPhoto = $this->Essential->imgsummernote($encryptedName);
				if ($upPhoto !== "success") {
					echo "<script>$('#uploadImgStatus').removeClass(\"alert-success\");$('#uploadImgStatus').addClass(\"alert-danger\");$('#uploadImgStatus').html(\"<strong>Sorry!</strong> Something gone wrong!\")</script>";
				} else {
					echo "<script>$('#uploadImgStatus').removeClass(\"alert-danger\");$('#uploadImgStatus').addClass(\"alert-success\");$('#uploadImgStatus').html(\"<strong>Success!</strong> Successfully uploaded and updated.\")</script>";
				}
				
			}else{
				$error = $this->upload->display_errors();
        		echo "<script>$('#uploadImgStatus').removeClass(\"alert-success\");$('#uploadImgStatus').addClass(\"alert-danger\");$('#uploadImgStatus').html(\"<strong>Error:</strong> ". $error ."\")</script>";
			}

		} else {
			redirect(base_url('user/login'));
		}
	}
	public function showPhotos() {
		$photosSum = $this->Essential->photosSum();
		echo '<div class="row">';
			
				foreach($photosSum as $photos) {
	
				echo '<div class="col-sm-3">';
					echo '<img class="img-thumbnail" src="'.base_url($photos->url).'" alt="Image-'. $photos->photo_id . '" onclick=\'getImageSrc(this)\'>';
				echo '</div>';
				
				}
			
		echo '</div>';
	}
}
