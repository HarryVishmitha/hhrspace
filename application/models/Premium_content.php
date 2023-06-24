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
	public function add_pcFile($add_pc_file) {
		if ($this->db->insert('premium_content', $add_pc_file)) {
			$status = "success";
		} else {
			$status = "failed";
		}
		return $status;
	}
	public function geteditablepc($pcId) {
		$this->db->where("pc_id", $pcId);
		$query = $this->db->get('premium_content');
		if ($query->num_rows() == 1) {
			$result = $query->row();
			$file_name = $result->file_name;
			$file_url = $result->file_url;
			$price = $result->price;
			$file_description = stripslashes($result->file_description);
			$content = '<form id="update_pc_item">
							<div class="form-floating mb-3">
								<input type="text" class="form-control" id="fileId" placeholder="xxxxxxxxx" value="'. $pcId .'" disabled>
								<input type="text" name="fileid" value="' . $pcId . '" hidden>
								<label for="fileId">ID</label>
							</div>
							<div class="form-floating mb-3">
								<input type="text" class="form-control" id="file_name" placeholder="file name" value="'. $file_name .'" name="file_name">
								<label for="file_name">File name</label>
							</div>
							<div class="form-floating mb-3">
								<input type="text" class="form-control" id="file_url" placeholder="xxxxxxxxx" value="'. $file_url .'" name="file_url" disabled>
								<label for="file_url">File url</label>
							</div>
							<div class="form-floating mb-3">
								<input type="number" class="form-control" id="fgpriceE" placeholder="xxxxxxxxx" value="'. $price .'" name="priceE">
								<label for="price">Price</label>
							</div>
							<div class="mb-3">
								<div class="form-floating">
									<textarea type="text" class="form-control" id="file_description" placeholder="100" name="file_description" style="height: 200px;" value="'. $file_description .'">'. $file_description .'</textarea>
									<label for="file_description">Description (optional)</label>
								</div>
							</div>
							<input type="submit" value="Save changes" class="btn btn-outline-primary">
						</form>
						<script>
						$(document).ready(function () {
							$("#update_pc_item").submit(function (e) { 
								e.preventDefault();
								var file_name = $("#file_name").val();
								var price = $("#fgpriceE").val();
								var file_description = $("#file_description").val();
								console.log(file_name);
								console.log(price);
								console.log(file_description);
								if (file_name == "" || price == "" || file_description == "") {
									if (file_name == "") {
										$("#file_name").addClass("is-invalid");
									} else {
										$("#file_name").removeClass("is-invalid");
									}
									if (price == "") {
										$("#price").addClass("is-invalid");
									} else {
										$("#price").removeClass("is-invalid");
									}
									if (file_description == "") {
										$("#file_description").addClass("is-invalid");
									} else {
										$("#file_description").removeClass("is-invalid");
									}
								} else {
									$("#file_name").removeClass("is-invalid");
									$("#price").removeClass("is-invalid");
									$("#file_description").removeClass("is-invalid");
									var formData = $("#update_pc_item").serialize();
									$.ajax({
										url: "'.base_url('admin/edit_pc_item') .'",
										type: "POST",
										data: formData,
										dataType: "html",
										success: function(response) {
											console.log("Ajax success");
											$("#something").append(response);
											show_notification();
										},
										error: function(jqXHR, textStatus, errorThrown) {
											console.log("Error: " + jqXHR);
											console.log("Error: " + textStatus);
											console.log("Error: " + errorThrown);
										}
									});
								}
							});
						});
						</script>';
		} else {
			$content = '<!-- Nothing -->
			<div class="nothing" id="nothing">
				<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z"/></svg>
				<div class="h3">Oops!</div>
				<p>Something is missing...</p>
			</div>';
		}
		return $content;
	}
	public function editing_pc_item($fileId, $update_item) {
		$this->db->where("pc_id", $fileId);
		if ($this->db->update("premium_content", $update_item)) {
			$res = "<script>$('#notification').addClass('alert-success');$('#notification').removeClass('alert-danger');$('#notification').html('Successfully updated!');console.log('suc');location.reload()</script>";
		} else {
			$res = "<script>$('#notification').addClass('alert-danger');$('#notification').removeClass('alert-succes');$('#notification').html('Something went wrong!');console.log('error');</script>";
		}
		return $res;
	}
}
