<div class="main mt-3">
	<div class="page-item shadow-sm container p-3">
		<div class="accordion" id="accordionExample">
			<div class="accordion-item">
				<h2 class="accordion-header">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					Send emails
				</button>
				</h2>
				<div id="collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
				<div class="accordion-body">
					<form id="SendtoAllE">
						<div class="d-flex justify-content-center">
							<div class="spinner-border text-primary" role="status" id="emailnotifi-spinner" style="display: none;">
								<span class="visually-hidden">Loading...</span>
							</div>
						</div>
						<div class="status alert" id="emailnotifi_status"></div>
						<div class="mt-3 mb-3">
							<label for="Subject">Subject</label>
							<input type="text" class="form-control" placeholder="Informing new feature." name="subject" id="subject">
							<div class="invalid-feedback" id="subject-error"></div>
						</div>
						<div class="mt-3 mb-3">
							<label for="Body">Email Body</label>
							<div class="row">
								<div class="col-sm-10">
									<textarea name="Ebody" id="Ebody" class="form-control"></textarea>
								</div>
								<div class="col-sm-2">
									<div class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#uploadImage">Upload Image</div>
								</div>
							</div>
							<div class="invalid-feedback" id="Ebody-error"></div>
						</div>
						<div class="mt-3 mb-3">
							<label for="sendto">Send to</label>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" value="admins" id="flexCheckDefault" name="admin" checked>
								<label class="form-check-label" for="flexCheckDefault">
									Admins
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" value="authors" id="flexCheckDefault" name="author" checked>
								<label class="form-check-label" for="flexCheckDefault">
									Authors
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" value="members" id="flexCheckDefault" name="member">
								<label class="form-check-label" for="flexCheckDefault">
									Members
								</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="checkbox" value="subscribers" id="flexCheckDefault" name="subscriber">
								<label class="form-check-label" for="flexCheckDefault">
									Subscribers
								</label>
							</div>
						</div>
						<input type="submit" value="Send" class="btn btn-outline-primary">
					</form>
				</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
					Send an Image via Telegram
				</button>
				</h2>
				<div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
					<div class="accordion-body">
						<form id="Imagetele">
							<div class="linear-progress-material small mb-3 mt-3" id="loader" style="display: none;">
								<div class="bar bar1"></div>
								<div class="bar bar2"></div>
							</div>
							<div class="status alert" id="Tele_img_status"></div>
							<div id="imagePreviewt" class="d-flex justify-content-center"></div>
							<div class="mt-3 mb-3">
								<label for="imageUrl">Image url  <span class="text-secodary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title='You can not use localhost urls'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/></svg></span></label>
								<div class="input-group mb-3">
									<input type="url" name="Imageurl" id="imageUrlt" class="form-control">
									<button class="btn btn-outline-info" type="button" id="getImaget">Get Image</button>
									<div class="btn btn-primary"data-bs-toggle="modal" data-bs-target="#uploadImage">Upload Image</div>
									<div class="invalid-feedback" id="teleImage-error"></div>
								</div>
							</div>
							<div class="mt-3 mb-3">
								<label for="captioin">Caption (Optional)  <span class="text-secodary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title='You can use html format. For more informations read telegram api documentation. https://core.telegram.org/bots/api#html-style'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/></svg></span></label>
								<textarea name="captiont" id="Captiont" class="form-control"></textarea>
							</div>
							<input type="submit" value="Send Image" class="btn btn-outline-primary">
						</form>
					</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
					Send text message via Telegram
				</button>
				</h2>
				<div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionExample">
					<div class="accordion-body">
						<form id="telemessage">
						<div class="linear-progress-material small mb-3 mt-3" id="loader1" style="display: none;">
								<div class="bar bar1"></div>
								<div class="bar bar2"></div>
							</div>
							<div class="status alert" id="Telemessa_status"></div>
							<div class="mt-3 mb-3">
								<label for="message">Message</label>
								<textarea name="messageT" id="messageT" class="form-control"></textarea>
								<div class="invalid-feedback" id="messageT_Error"></div>
							</div>
							<input type="submit" value="Send" class="btn btn-outline-primary">
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- History Buttons -->
		<div class="mt-4 d-flex justify-content-between">
			<a href="<?php echo base_url('admin/history_emails') ?>" class="btn btn-outline-secondary">Email sending History</a>
			<a href="<?php echo base_url('admin/history_telegrams') ?>" class="btn btn-outline-secondary">Telegram message sending History</a>
			<div class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#Sendpoll">Send Poll via telegram.</div>
		</div>
	</div>
</div>
<!--Upload image Modal -->
<div class="modal fade" id="uploadImage" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Upload Image</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<div class="upload w-75">
			<!-- Upload Images to summernote -->
			<div class="alert" id="uploadImgStatus" style="display: none;"></div>
			<form class="row g-3" id="uploadPhoto" enctype="multipart/form-data">
				<div class="d-flex justify-content-center">
					<div class="spinner-border text-primary" role="status" id="uploadPhoto-spinner" style="display: none;">
						<span class="visually-hidden">Loading...</span>
					</div>
				</div>

				<div class="col-auto">
					<input class="form-control" type="file" id="upPhoto" name="uploadPhotoSum">
				</div>
				<div class="col-auto">
					<input type="submit" value="Upload" class="btn btn-info">
				</div>
			</form>
		</div>
		<hr>
		<div id="photo_lib"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--Send Polls via telegram-->
<div class="modal fade" id="Sendpoll" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Send poll via Telegram</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
		<form id="sendPoll">
			<div class="linear-progress-material small mb-3 mt-3" id="loader2" style="display: none;">
				<div class="bar bar1"></div>
				<div class="bar bar2"></div>
			</div>
			<div class="status alert" id="Telepoll_status"></div>
			<div class="mt-3 mb-3">
				<label for="question">Question</label>
				<input type="text" name="question" id="Question" class="form-control" placeholder="What is capital of Sri Lanka?">
				<div class="invalid-feedback" id="question-error">Can not be empty.</div>
			</div>
			<div class="mt-3 mb-3">
				<label for="Options">Options <span class="text-secodary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title='You must add least two options. If you only want to add two options leave others empty'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/></svg></span></label>
				<div class="form-floating mb-3">
					<input type="text" class="form-control" id="floatingInput1" placeholder="Paris" name="option1">
					<label for="floatingInput">Option #1</label>
				</div>
				<div class="form-floating mb-3">
					<input type="text" class="form-control" id="floatingInput2" placeholder="London" name="option2">
					<label for="floatingInput">Option #2</label>
				</div>
				<div class="form-floating mb-3">
					<input type="text" class="form-control" id="floatingInput3" placeholder="Colombo" name="option3">
					<label for="floatingInput">Option #3</label>
				</div>
				<div class="form-floating mb-3">
					<input type="text" class="form-control" id="floatingInput4" placeholder="Sri Jayawardhanapura kotte" name="option4">
					<label for="floatingInput">Option #4</label>
				</div>
				<div class="form-floating mb-3">
					<input type="text" class="form-control" id="floatingInput5" placeholder="Newyork" name="option5">
					<label for="floatingInput">Option #5</label>
				</div>
			</div>
			<input type="submit" value="Send" class="btn btn-primary">
		</form>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script>
	$(document).ready(function() {
      $('#Ebody').summernote({
		height: 200
	  });
    });
	function getImageSrc(img) {
		const url = img.src;
		navigator.clipboard.writeText(url)
			.then(() => alert('Image URL copied to clipboard and added to editor.'))
			.catch(err => alert('Failed to copy image URL', err));
		$('#Ebody').summernote('insertImage', url);
		$("#imageUrlt").attr('value', url);
	}
	$(document).ready(function () {
		$("#SendtoAllE").submit(function (e) { 
			e.preventDefault();
			var subject = $("#subject").val();
			if (subject== "") {
				$("#subject").addClass("is-invalid");
				$("#subject-error").html("Subject cannot be empty.");
			} else {
				$("#subject").removeClass("is-invalid");
				$("#subject-error").html("");
				$("#emailnotifi-spinner").show();
				var formData = $('#SendtoAllE').serialize();

				$.ajax({
					url: "<?php echo base_url('admin/sendemailNotifi') ?>",
					type: "POST",
					data: formData,
					dataType: "html",
					success: function(response) {
						console.log('Ajax success');
						$('#emailnotifi_status').html(response);
						$("#emailnotifi-spinner").hide();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.log('Error: ' + jqXHR);
						console.log('Error: ' + textStatus);
						console.log('Error: ' + errorThrown);
						$('#emailnotifi_status').addClass('alert-danger');
						$('#emailnotifi_status').html('<strong>Sorry!</strong> Something went wrong! Please try again later.');
						$("#emailnotifi-spinner").hide();
					}
				});
			}
		});
	});
	$(document).ready(function () {
		$("#getImaget").click(function (e) { 
			e.preventDefault();
			$("#loader").show();
			var imageUrlt = $("#imageUrlt").val();
			var imaget = $("<img class='favicon_preview shadow' id='teleimage'>").attr('src', imageUrlt);
			$("#imagePreviewt").empty().append(imaget);
			imaget.on('load', function() {
				// Image loaded, hide the loader
				$('#loader').hide();
			});
		});
		$("#Imagetele").submit(function (e) { 
			e.preventDefault();
			var imageUrlte = $("#imageUrlt").val();
			if (imageUrlte.length < 5) {
				$("#imageUrlt").addClass("is-invalid");
				$("#teleImage-error").html("Please enter valid url (minimum 5 characters)");
			} else {
				$("#imageUrlt").removeClass("is-invalid");
				$("#teleImage-error").html("");
				$("#loader").show();
				var formData = $('#Imagetele').serialize();

				$.ajax({
					url: "<?php echo base_url('admin/sendImageTele') ?>",
					type: "POST",
					data: formData,
					dataType: "html",
					success: function(response) {
						console.log('Ajax success');
						$('#Tele_img_status').removeClass('alert-danger');
						$('#Tele_img_status').html(response);
						$("#Tele_img_status").addClass("alert-warning");
						$("#loader").hide();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.log('Error: ' + jqXHR);
						console.log('Error: ' + textStatus);
						console.log('Error: ' + errorThrown);
						$("#Tele_img_status").removeClass("alert-warning");
						$('#Tele_img_status').addClass('alert-danger');
						$('#Tele_img_status').html('<strong>Sorry!</strong> Something went wrong! Please try again later.');
						$("#loader").hide();
					}
				});
			}
		});
	});
	$(document).ready(function () {
		$("#telemessage").submit(function (e) { 
			e.preventDefault();
			var messageT = $("#messageT").val();

			if (messageT == "") {
				$("#messageT").addClass("is-invalid");
				$("#messageT_Error").html("Message can not be empty.");
			} else {
				$("#messageT").removeClass("is-invalid");
				$("#messageT_Error").html("");
				$("#loader1").show();
				var formData = $('#telemessage').serialize();

				$.ajax({
					url: "<?php echo base_url('admin/sendTmsg') ?>",
					type: "POST",
					data: formData,
					dataType: "html",
					success: function(response) {
						console.log('Ajax success');
						$('#Telemessa_status').removeClass('alert-danger');
						$('#Telemessa_status').html(response);
						$("#Telemessa_status").addClass("alert-warning");
						$("#loader1").hide();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.log('Error: ' + jqXHR);
						console.log('Error: ' + textStatus);
						console.log('Error: ' + errorThrown);
						$('#Telemessa_status').addClass('alert-danger');
						$("#Telemessa_status").removeClass("alert-warning");
						$('#Telemessa_status').html('<strong>Sorry!</strong> Something went wrong! Please try again later.');
						$("#loader1").hide();
					}
				});
			}
		});
	});
	$(document).ready(function () {
		$("#sendPoll").submit(function (e) { 
			e.preventDefault();
			var ques = $("#Question").val();
			var op1 = $("#floatingInput1").val();
			var op2 = $("#floatingInput2").val();

			if (ques == "" || op1 == "" || op2 == "") {
				if (ques == "") {
					$("#Question").addClass("is-invalid");
				} else {
					$("#Question").removeClass("is-invalid");
				}
				if (op1 == "") {
					$("#floatingInput1").addClass("is-invalid");
				} else {
					$("#floatingInput1").removeClass("is-invalid");
				}
				if (op2 == "") {
					$("#floatingInput2").addClass("is-invalid");
				} else {
					$("#floatingInput2").removeClass("is-invalid");
				}
			} else {
				$("#Question").removeClass("is-invalid");
				$("#floatingInput1").removeClass("is-invalid");
				$("#floatingInput2").removeClass("is-invalid");
				$("#loader2").show();
				var formData = $('#sendPoll').serialize();

				$.ajax({
					url: "<?php echo base_url('admin/sendPollTele') ?>",
					type: "POST",
					data: formData,
					dataType: "html",
					success: function(response) {
						console.log('Ajax success');
						$('#Telepoll_status').removeClass('alert-danger');
						$('#Telepoll_status').html(response);
						$("#Telepoll_status").addClass("alert-warning");
						$("#loader2").hide();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.log('Error: ' + jqXHR);
						console.log('Error: ' + textStatus);
						console.log('Error: ' + errorThrown);
						$("#Telepoll_status").removeClass("alert-warning");
						$('#Telepoll_status').addClass('alert-danger');
						$('#Telepoll_status').html('<strong>Sorry!</strong> Something went wrong! Please try again later.');
						$("#loader2").hide();
					}
				});
			}
		});
	});
</script>
