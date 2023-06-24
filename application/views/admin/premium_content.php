<div class="main mt-3">
	<div class="container page-item shadow-sm p-3">
		<div class="d-flex justify-content-between">
			<div class="text-secondary border px-2 py-1">Total pages : <?php echo $total_pages; ?></div>
			<div id="special_note" class="px-2 py-1 text-light" onclick="location.reload()" style="cursor: pointer;"></div>
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
						<div class="linear-progress-material small mb-3 mt-3" id="pc_loader" style="display: none;">
							<div class="bar bar1"></div>
							<div class="bar bar2"></div>
						</div>
						<div class="status alert" id="pc_status"></div>
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
								<input type="text" class="form-control" id="f_url" placeholder="url/xxxxxxx" name="f_url" hidden>
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
								<label for="f_description">Description (optional)</label>
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

		<div id="pc_table" class="table-responsive">
		<?php 
			if ($this->Essential->pctotalrows() > 0) {
				?>
				<table class="table table-hover table-bordered">
					<thead class="table-secondary">
						<tr>
							<th scope="col">ID</th>
							<th scope="col">File name</th>
							<th scope="col">File type</th>
							<th scope="col">Price</th>
							<th scope="col">Description</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($rows as $message): ?>
						<tr>
							<td scope="row"><?php echo $message->pc_id; ?></td>
							<td><?php echo $message->file_name; ?></td>
							<td><?php echo $message->file_type; ?></td>
							<td><?php echo $message->price; ?></td>
							<td><div class="clamp-5"><?php echo stripslashes($message->file_description); ?></div></td>
							<td class="d-flex align-items-center"><button class="btn btn-secondary me-1" type="button" data-bs-toggle="modal" data-bs-target="#updatePc" onclick="updatePC('<?php echo $message->pc_id; ?>')"><i class="fas fa-pencil-alt"></i></button><button class="btn btn-danger ms-1 delete-button" data-pc-id="<?php echo $message->pc_id; ?>"><i class="fas fa-trash-alt"></i></button></td>
						</tr>
					<?php endforeach; ?>
					</tbody>
				</table>
				<?php
			} else {
				?>
				<!-- Nothing -->
				<div class="nothing" id="nothing">
					<svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z"/></svg>
					<div class="h3">Oops!</div>
					<p>It seems there's nothing to display. Please wait until something is added.</p>
				</div>
				<?php
			}
						
			?>
		</div>
		<hr>
		<!-- Pagination Links -->
		<div class="mt-4 mb-3 pb-3">
			<nav aria-label="Page navigation">
				<ul class="pagination justify-content-center">
					<li class="page-item <?php if ($currentPageNum == 1){echo "disabled";} ?>"><a class="page-link" href="<?php echo base_url('admin/premium/'.($currentPageNum-1)); ?>">Previous</a></li>
					<li class="page-item disabled"><a class="page-link" href="<?php echo base_url('admin/premium/' . $currentPageNum); ?>"><?php echo $currentPageNum; ?></a></li>
					<li class="page-item <?php if ($currentPageNum == $total_pages){echo "disabled";} ?>"><a class="page-link" href="<?php echo base_url('admin/premium/'.($currentPageNum+1)); ?>">Next</a></li>
				</ul>
			</nav>
		</div>
		<hr>
	</div>
</div>
<!--Update pc Modal -->
<div class="modal fade" id="updatePc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
			<div class="uploader w-100 justify-content-center" id="uploader" style="display: flex;">
				<div class="spinner-grow text-primary" role="status">
					<span class="visually-hidden">Loading...</span>
				</div>
			</div>
			<div id="datePc"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div id="notification" class="alert" role="alert"></div>
<div id="something" class="visually-hidden"></div>
<script>
	$(document).ready(function () {
		//File upload
		$("#button-addon2").click(function (e) { 
			e.preventDefault();
			var formData = new FormData();
			formData.append('pc_file', $('#pc_file')[0].files[0]);
			$.ajax({
				url: '<?php echo base_url('admin/premium_upload') ?>', // Replace with your CodeIgniter upload URL
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
					console.log('ajax success');
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
		});
		$("#f_url_link").keyup(function (e) { 
			$("#f_url").attr("value", $("#f_url_link").val());
		});
		//Closing function
		$("#model_cLose").click(function (e) { 
			$("#uploadPremium_content")[0].reset();
			$("#f_url").attr("value", "");
		});
		//Add content
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
					$("#f_name").removeClass("is-invalid");
					$("#f_name_error").html("");
				}
				if (f_url == "" && f_url_link == "") {
					$("#f_url").addClass("is-invalid");
					$("#f_url_link").addClass("is-invalid");
					$("#f_url_error").html("Please upload file or link a file");
					$("#f_url_link_error").html("Please upload file or link a file");
				} else {
					$("#f_url").removeClass("is-invalid");
					$("#f_url_link").removeClass("is-invalid");
					$("#f_url_error").html("");
					$("#f_url_link_error").html("");
				}
				if (f_price == "") {
					$("#f_price").addClass("is-invalid");
					$("#f_price_error").html("Price cannot be empty.");
				} else {
					$("#f_price").removeClass("is-invalid");
					$("#f_price_error").html("");
				}
			} else {
				$("#f_name").removeClass("is-invalid");
				$("#f_name_error").html("");
				$("#f_url").removeClass("is-invalid");
				$("#f_url_link").removeClass("is-invalid");
				$("#f_url_error").html("");
				$("#f_url_link_error").html("");
				$("#f_price").removeClass("is-invalid");
				$("#f_price_error").html("");
				$("#pc_loader").show();
				var formData = new FormData($('#uploadPremium_content')[0]);
				$.ajax({
					url: "<?php echo base_url('admin/add_pc') ?>",
					type: "POST",
					data: formData,
					dataType: "html",
					contentType: false,
    				processData: false,
					success: function(response) {
						console.log('Ajax success');
						$('#pc_status').html(response);
						$("#pc_loader").hide();
						
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.log('Error: ' + jqXHR);
						console.log('Error: ' + textStatus);
						console.log('Error: ' + errorThrown);
						$('#pc_status').addClass('alert-danger');
						$('#pc_status').html('<strong>Sorry!</strong> Something went wrong! Please try again later.');
						$("#pc_loader").hide();
					}
				});
			}
		});
	});
	function updatePC(pcId) {
		console.log("Getting details about " + pcId);
		$('#datePc').html("");
		$('#datePc').removeClass('alert alert-danger');
		var formDataU = new FormData();
		formDataU.append('pcId', pcId);
		$("#uploader").show();
		$.ajax({
			url: "<?php echo base_url('admin/edit_Pc') ?>",
			type: "POST",
			data: formDataU,
			dataType: "html",
			contentType: false,
			processData: false,
			success: function(response) {
				console.log('Ajax success');
				$('#datePc').html(response);
				$("#uploader").hide();
							
			},
			error: function(jqXHR, textStatus, errorThrown) {
				$("#uploader").hide();
				console.log('Error: ' + jqXHR);
				console.log('Error: ' + textStatus);
				console.log('Error: ' + errorThrown);
				$('#datePc').addClass('alert alert-danger');
				$('#datePc').html('<strong>Sorry!</strong> Something went wrong! Please try again later.');
					
			}
		});
	}
	$(document).ready(function() {
        $('.delete-button').click(function() {
            var pcId = $(this).data('pc-id');
            var row = $(this).closest('tr');
            var formDataU = new FormData();
			formDataU.append('pcId', pcId);
			$.ajax({
				url: "<?php echo base_url('admin/delete_Pc_item') ?>",
				type: "POST",
				data: formDataU,
				dataType: "html",
				contentType: false,
				processData: false,
				success: function(response) {
					console.log('Ajax success');
					row.addClass('deleted-row');
					row.on('animationend', function() {
						row.remove();
						$("#special_note").html("Refresh page to view original");
						$("#special_note").addClass("bg-danger");
						show_notification();
						$("#something").append(response);
					});		
				},
				error: function(jqXHR, textStatus, errorThrown) {
					console.log('Error: ' + jqXHR);
					console.log('Error: ' + textStatus);
					console.log('Error: ' + errorThrown);
				}
			});
        });
    });
	
</script>

