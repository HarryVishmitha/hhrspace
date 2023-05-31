<div class="main mt-3">
	<div class="container page-item shadow-sm p-3">
		<div class="d-flex justify-content-end">
			<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" id="f_u_open">
				<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
					<path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2Zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672Z"/>
					<path d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5Z"/>
				</svg>
				Add Premium content
			</button>
		</div>
		
		<!-- Premium content Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<h1 class="modal-title fs-5" id="exampleModalLabel">Add new premium content</h1>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<form id="uploadPremium_content" method="post" enctype="multipart/form-data">
						<div class="mb-3">
							<div class="form-floating">
								<input type="text" class="form-control" id="f_name" placeholder="xxxxxxxxxx" name="f_name">
								<label for="f_name">File name</label>
								<div class="invalid-feedback" id="f_name_error"></div>
							</div>
						</div>
						<nav>
							<div class="nav nav-tabs d-flex justify-content-between tab-Toggle" id="nav-tab" role="tablist">
								<button class="nav-link active" id="nav-upload-tab" data-bs-toggle="tab" data-bs-target="#upload" type="button" role="tab" aria-controls="upload" aria-selected="true">Upload</button>
								<button class="nav-link" id="nav-link-tab" data-bs-toggle="tab" data-bs-target="#link" type="button" role="tab" aria-controls="link" aria-selected="false">Using link</button>
							</div>
						</nav>
						<div class="tab-content" id="nav-tabContent">
							<div class="tab-pane fade show active" id="upload" role="tabpanel" aria-labelledby="nav-upload-tab" tabindex="0">
								<br>
								<div class="progress mb-3">
									<div id="progressBar" class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
								</div>
								<div id="upload_status"></div>
								<div class="input-group mb-3">
									<input class="form-control" type="file" id="pc_file" name="pc_file">
									<button class="btn btn-secondary" type="button" id="button-addon2">upload</button>
								</div>
								<div class="mb-3">
									<div class="form-floating">
										<input type="text" class="form-control" id="f_url" placeholder="url/xxxxxxx" name="f_url" disabled>
										<label for="f_name">File url</label>
										<div class="invalid-feedback" id="f_url_error"></div>
									</div>
								</div>
							</div>
							<div class="tab-pane fade show" id="link" role="tabpanel" aria-labelledby="nav-link-tab" tabindex="0">
								<br>
								<div class="mb-3">
									<div class="form-floating">
										<input type="url" class="form-control" id="f_url_link" placeholder="url/xxxxxxx" name="f_url_link">
										<label for="f_name">File url</label>
										<div class="invalid-feedback" id="f_url_link_error"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="mb-3">
							<div class="form-floating">
								<input type="number" class="form-control" step="0.01" id="f_price" placeholder="100" name="f_price">
								<label for="f_price">Price</label>
								<div class="invalid-feedback" id="f_price_error"></div>
							</div>
						</div>
						<div class="mb-3">
							<div class="form-floating">
								<textarea type="text" class="form-control" id="f_description" placeholder="100" name="f_description" style="height: 100px"></textarea>
								<label for="f_description">Description</label>
							</div>
						</div>
						<input type="submit" value="Submit & publish" class="btn btn-outline-info">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="model_cLose">Close</button>
				</div>
				</div>
			</div>
		</div>

		<hr>

	</div>
</div>
<script>
	$(document).ready(function () {
		$("#button-addon2").click(function (e) { 
			e.preventDefault();
			var formData = new FormData($("#pc_file")[0]);
			$.ajax({
				url: 'your_upload_url', // Replace with your CodeIgniter upload URL
				type: 'POST',
				data: formData,
				processData: false,
				contentType: false,
				xhr: function() {
					var xhr = new window.XMLHttpRequest();
					xhr.upload.addEventListener('progress', function(e) {
					if (e.lengthComputable) {
						var percent = Math.round((e.loaded / e.total) * 100);
						$('#progressBar').width(percent + '%').text(percent + '%');
					}
					});
					return xhr;
				},
				success: function(response) {
					$("#upload_status").html(response);
				},
				error: function(jqXHR, textStatus, errorThrown) {
					// Handle any errors
					$("#upload_status").addClass('alert alert-danger');
					$("#upload_status").html("Something went wrong!");
					console.log(jqXHR);
					console.log(textStatus);
					console.log(errorThrown);
				}
			});
			var file = $("#pc_file").val();
			$("#f_url").attr("value", file );
		});
		$("#model_cLose").click(function (e) { 
			$("#uploadPremium_content")[0].reset();
			$("#f_url").attr("value", "");
		});
		$("#uploadPremium_content").submit(function (e) { 
			e.preventDefault();
			var f_name = $("#f_name").val();
			var f_url = $("#f_url").val();
			var f_url_link = $("#f_url_link").val();
			var f_price = $("#f_price").val();

			if (f_name == "" || f_url == "" || f_url == "" && f_url_link == "" || f_price == "") {
				if (f_name == "") {
					$("#f_name").addClass("is-invalid");
					$("#f_name_error").html("You must add a filename");
				} else {
					
				}
				if (f_url == "" && f_url_link == "") {
					$("#f_url").addClass("is-invalid");
					$("#f_url_link").addClass("is-invalid");
					$("#f_url_error").html("Please upload file or link a file");
					$("#f_url_link_error").html("Please upload file or link a file");
				} else {
					
				}
			} else {
				
			}
		});
	});
</script>
