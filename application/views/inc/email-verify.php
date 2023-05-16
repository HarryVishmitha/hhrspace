<div class="container page-item mb-3 shadow-sm py-4">
	<div class="d-flex justify-content-center align-items-center">
		<div class="sh w-75">
			<div id="staus12H" class="alert"></div>
			<div class="status alert alert-warning my-3" id="status">
				We've sent email to <?php echo $emailAddress; ?> with verifiction code. Please check your inbox.
				<br>
				Please note that before get new verification code check your spam folder.
			</div>
			<div class="sh">
				<form id="verfication">
					<div class="form-floating mb-3">
						<input type="number" class="form-control" id="otp" placeholder="######" name="otp">
						<label for="pass">Verification code</label>
						<div class="invalid-feedback" id="otp-error"></div>
					</div>
					<input type="email" name="email" value="<?php echo $emailAddress;?>" hidden>
					<input type="submit" class="btn btn-outline-primary d-inline" value="Verify your Email">
					<div class="spinner-border text-info" role="status" id="spinner" style="display: none;">
						<span class="visually-hidden">Loading...</span>
					</div>
				</form>
				<div class="p mt-3 d-inline">Didn't get email or something else?<form id="resendE" class="d-inline"><input type="email" name="email" value="<?php echo $emailAddress;?>" hidden><input type="submit" value="Resend verification code." class="btn btn-link text-decoration-none text-primary"></form></div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		$("#verfication").submit(function (e) { 
			e.preventDefault();
			var otp = $("#otp").val();
			if (otp.length < 6) {
				
				$("#status").removeClass("alert-warning");
				$("#status").addClass("alert-danger");
				$("#status").html("Verification code must be 6 digits");
				$("#otp").addClass('is-invalid');
				$("#otp-error").html("Verification code must be 6 digits");
			} else if (otp.length > 6 ) {
				
				$("#status").removeClass("alert-warning");
				$("#status").addClass("alert-danger");
				$("#status").html("Verification code must be 6 digits");
				$("#otp").addClass('is-invalid');
				$("#otp-error").html("Verification code must be 6 digits");
			} else {
				
				$("#status").removeClass("alert-warning");
				$("#status").removeClass("alert-danger");
				$("#otp").removeClass('is-invalid');
				$("#otp-error").html("");
				$("#status").html("");
				var formData = $('#verfication').serialize();

				$.ajax({
					url: "<?php echo base_url('user/verify_email') ?>",
					type: "POST",
					data: formData,
					dataType: "html",
					success: function(response) {
						
						console.log('Ajax success');
						$('#status').html(response);
						$("#spinner").hide();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						
						console.log('Error: ' + jqXHR);
						console.log('Error: ' + textStatus);
						console.log('Error: ' + errorThrown);
						$('#status').addClass('alert-danger');
						$('#status').html('<strong>Sorry!</strong> Something went wrong! Please try again later.');
						$("#spinner").hide();
					}
				});

			}
		});
	});

	$(document).ready(function () {
		$("#resendE").submit(function (e) { 
			e.preventDefault();
			$("#status").removeClass("alert-warning");
			$("#status").removeClass("alert-danger");
			$("#otp").removeClass('is-invalid');
			$("#otp-error").html("");
			$("#status").addClass("alert-warning");
			$("#status").html("Please wait! Resending email...");

			
			var formData = $('#resendE').serialize();

				$.ajax({
					url: "<?php echo base_url('user/gene_new_otp') ?>",
					type: "POST",
					data: formData,
					dataType: "html",
					success: function(response) {
						$("#status").removeClass("alert-warning");
						$("#status").removeClass("alert-danger");
						$("#otp").removeClass('is-invalid');
						$("#otp-error").html("");
						console.log('Ajax success');
						$('#status').html(response);
						
					},
					error: function(jqXHR, textStatus, errorThrown) {
						$("#status").removeClass("alert-warning");
						$("#status").removeClass("alert-danger");
						$("#otp").removeClass('is-invalid');
						$("#otp-error").html("");
						console.log('Error: ' + jqXHR);
						console.log('Error: ' + textStatus);
						console.log('Error: ' + errorThrown);
						$('#status').addClass('alert-danger');
						$('#status').html('<strong>Sorry!</strong> Something went wrong! Please try again later.');
					}
				});
		});
	});
</script>
