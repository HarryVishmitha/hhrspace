<div class="container-fluid vh-100">
	<div class="d-flex justify-content-center align-items-center vh-100">
		<div class="row page-item shadow container">
			<div class="col-sm-6 register-left d-none d-lg-block d-md-block"></div>
			<div class="col-sm-6 register-right pt-3">
				<div class="d-flex justify-content-center align-items-center" style="height:100%;">
					<div class="s w-75 mt-3 mb-3">
						<div class="h1 text-center"><?php echo $site_name; ?></div>
						<div class="h3 text-info text-center mb-3">Sign Up</div>
						<div class="spinner-border" role="status" id="spinner" style="display: none;">
							<span class="visually-hidden">Loading...</span>
						</div>
						<div id="status" class="alert"></div>
						<form method="post" id="signup">
							<div class="form-floating mb-3">
								<input type="text" class="form-control form-input" id="first_name" placeholder="Harry" name="first-name">
								<label for="first_name">First Name</label>
								<div class="invalid-feedback" id="fName-error"></div>
							</div>
							<div class="form-floating mb-3">
								<input type="text" class="form-control form-input" id="last_name" placeholder="Potter" name="last-name">
								<label for="last_name">Last Name</label>
								<div class="invalid-feedback" id="lName-error"></div>
							</div>
							<div class="form-floating mb-3">
								<input type="email" class="form-control form-input" id="email" placeholder="Harrypotter@gmail.com" name="email">
								<label for="email">Email Address</label>
								<div class="invalid-feedback" id="email-error"></div>
							</div>
							<div class="form-floating mb-3">
								<input type="password" class="form-control form-input" id="new_pass" placeholder="password" name="password">
								<label for="pass">Password</label>
								<div class="invalid-feedback" id="Pass-error"></div>
							</div>
							<div class="form-floating mb-3">
								<input type="password" class="form-control form-input" id="confirm_pass" placeholder="Harry" name="confirm_pass">
								<label for="confirm_pass">Confirm Password</label>
								<div class="invalid-feedback" id="confPass-error"></div>
							</div>
							<div class="form-check mb-3">
								<input class="form-check-input" type="checkbox" id="Show-pass">
								<label class="form-check-label" for="flexCheckDefault">
									Show Password
								</label>
							</div>
							<input type="submit" value="Sign-Up" class="btn btn-outline-primary">
							<div class="text-secondary pe-none mb-3">By clicking Sign-Up you're agree to our <a href="<?php echo base_url('home/terms-conditions') ?>" target="_blank" class="text-decoration-none text-primary pe-auto">Terms & Conditions.</a> & <a href="<?php echo base_url('home/privacy-policies') ?>" target="_blank" class="text-decoration-none text-primary pe-auto">Privacy Policies.</a>
								<br>
								Already member? <a href="<?php echo base_url('user/login')?>" class="text-primary text-decoration-none pe-auto">Sign-In</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	// Show password
	$(document).ready(function() {
		$('#Show-pass').click(function () { 
			if ($(this).is(':checked')) {
				$('#new_pass').attr('type', 'text');
				$('#confirm_pass').attr('type', 'text');
			} else {
				$('#new_pass').attr('type', 'password');
				$('#confirm_pass').attr('type', 'password');
			}
		});
	});
	
	//Check inputs
	$(document).ready(function() {
		$('#signup').submit(function (e) { 
			e.preventDefault();
			var fName = $('#first_name').val();
			var lName = $('#last_name').val();
			var email = $('#email').val();
			var nPass = $('#new_pass').val();
			var conPass = $('#confirm_pass').val();

			function confirmPass() {
				nPass === conPass
			}

			if (fName.length < 2 || lName.length < 2 || email === '' || nPass === '' || conPass === '' || nPass !== conPass || !isValidEmail(email)) {
				$('#status').addClass('alert-danger');
				$('#status').html('Please check your form again.');

				if (fName.length < 2 ) {
					$("#first_name").addClass('is-invalid');
					$("#fName-error").html("First name cann't be empty.");
				} else {
					$("#first_name").removeClass('is-invalid');
					$("#fName-error").html("");
				}

				if (lName.length < 2) {
					$("#last_name").addClass('is-invalid');
					$("#lName-error").html("Last name cann't be empty.");
				} else {
					$("#last_name").removeClass('is-invalid');
					$("#lName-error").html("");
				}
				
				if (email === '') {
					$("#email").addClass('is-invalid');
					$("#email-error").html("Email cann't be empty.");
				} else {
					$("#email").removeClass('is-invalid');
					$("#email-error").html("");
				}
				
				if (nPass === '') {
					$("#new_pass").addClass('is-invalid');
					$("#Pass-error").html("Password cann't be empty.");
				} else {
					$("#new_pass").removeClass('is-invalid');
					$("#Pass-error").html("");
				}
				
				if (conPass === '') {
					$("#confirm_pass").addClass('is-invalid');
					$("#confPass-error").addClass('invalid-feedback');
					$("#confPass-error").html("Confirm password cann't be empty.");
				} else {
					$("#confirm_pass").removeClass('is-invalid');
					$("#confPass-error").removeClass('invalid-feedback');
					$("#confPass-error").html("");
				}

				if (!isValidEmail(email)) {
					$("#email").addClass('is-invalid');
					$("#email-error").html("This cannt be email. (Not match with email format)");
					
				} else {
					$("#email").removeClass('is-invalid');
					$("#email-error").html("");
				}
				
				if (nPass !== conPass) {

					$('#confirm_pass').removeClass('is-valid');
					$('#confirm_pass').addClass('is-invalid');
					$('#confPass-error').removeClass('valid-feedback');
					$("#confPass-error").addClass('invalid-feedback');
					$('#confPass-error').html("Confirm password isn't matched.");

				} else {

					$('#confirm_pass').removeClass('is-invalid');
					$('#confirm_pass').addClass('is-valid');
					$('#confPass-error').removeClass('invalid-feedback');
					$("#confPass-error").addClass('valid-feedback');
					$('#confPass-error').html('Confirm password matched.');
				}
			} else {
				$('#status').removeClass('alert-danger');
				$('#status').html('');
				$('#confirm_pass').removeClass('is-invalid');
				$('#confirm_pass').addClass('is-valid');
				$('#confPass-error').removeClass('invalid-feedback');
				$("#confPass-error").addClass('valid-feedback');
				$('#confPass-error').html('Confirm password matched.');
				$("#email").removeClass('is-invalid');
				$("#email-error").html("");
				$("#new_pass").removeClass('is-invalid');
				$("#Pass-error").html("");
				$("#last_name").removeClass('is-invalid');
				$("#lName-error").html("");
				$("#first_name").removeClass('is-invalid');
				$("#fName-error").html("");
				$("#spinner").show();
				var formData = $('#signup').serialize();

				$.ajax({
					url: "<?php echo base_url('user/user_reg') ?>",
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

	function isValidEmail(email) {
		// regular expression pattern for matching email addresses
		var emailPattern = /^([a-zA-Z0-9_\-.]+)@([a-zA-Z0-9_\-.]+)\.([a-zA-Z]{2,5})$/;
		
		// test the email string against the pattern
		return emailPattern.test(email);
	}

	
</script>
