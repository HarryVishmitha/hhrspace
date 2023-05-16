<div class="container-fluid vh-100">
	<div class="d-flex justify-content-center align-items-center vh-100">
		<div class="row page-item shadow container">
			<div class="col-sm-6 login-left d-none d-lg-block d-md-block"></div>
			<div class="col-sm-6 login-right">
				<div class="d-flex justify-content-center align-items-center mt-3 mb-3" style="height:100%;">
					<div class="s w-75">
						<div class="h1 text-center"><?php echo $site_name; ?></div>
						<div class="h3 text-info text-center mb-3">Sign Up</div>
						
						<?php if (!empty($error_message)): ?>
							<div class="alert alert-danger"><?php echo $error_message; ?></div>
						<?php endif; ?>

						<div class="status alert" id="status"></div>
						<form action="<?php echo base_url('user/auth') ?>" method="post" id="signin">
							<div class="form-floating mb-3">
								<input type="email" class="form-control form-input" id="email" placeholder="Harrypotter@gmail.com" name="email">
								<label for="email">Email Address</label>
								<div class="invalid-feedback" id="email-error"></div>
							</div>
							<div class="form-floating mb-3">
								<input type="password" class="form-control form-input" id="pass" placeholder="password" name="password">
								<label for="pass">Password</label>
								<div class="invalid-feedback" id="pass-error"></div>
							</div>
							<div class="form-check mb-3">
								<input class="form-check-input" type="checkbox" id="Show-pass">
								<label class="form-check-label" for="flexCheckDefault">
									Show Password
								</label>
							</div>
							<input type="submit" value="Sign-In" class="btn btn-outline-primary">
							<div class="text-secondary pe-none mb-3 mt-3">
								Not a member? <a href="<?php echo base_url('user/register')?>" class="text-primary text-decoration-none pe-auto">Sign-Up</a>
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
				$('#pass').attr('type', 'text');
			} else {
				$('#pass').attr('type', 'password');
			}
		});
	});

	$(document).ready(function () {
		$("#signin").submit(function (e) { 
			
			var email = $("#email").val();
			var password = $("#pass").val();

			if (email === "" || password === "") {
				e.preventDefault();
				$("#status").addClass("alert-danger");
				$("#status").html("Please fill all inputs.");

				if (email === "") {
					$("#email").addClass("is-invalid");
					$("#email-error").html("Email can't be empty");
				} else {
					$("#email").removeClass('is-invalid');
					$("#email-error").html("");
				}

				if (password === "") {
					$("#pass").addClass("is-invalid");
					$("#pass-error").html("Password can't be empty");
				} else {
					$("#pass").removeClass("is-invalid");
					$("#pass-error").html("");
				}

			} else {
				$("#status").removeClass("alert-danger");
				$("#status").html("");
				$("#email").removeClass('is-invalid');
				$("#email-error").html("");
				$("#pass").removeClass("is-invalid");
				$("#pass-error").html("");

				if (!isValidEmail(email)) {
					e.preventDefault();
					$("#status").addClass("alert-danger");
					$("#status").html("Email doesn't match with email format.");
					$("#email").addClass('is-invalid');
					$("#email-error").html("This cannt be email. (Not match with email format)");
					
				} else {
					$("#email").removeClass('is-invalid');
					$("#email-error").html("");

				}
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
