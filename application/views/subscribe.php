<div class="container page-item mt-3 mb-3 shadow-sm p-4">
	<div class="item_name mb-2 h4">Subscribe to our newsletter</div>
    <p>Monthly digest of what's new and exciting from us.</p>
	<div class="status alert alert-warning" id="status">Fill this up!</div>
	<div class="d-flex justify-content-center">
		<div class="w-75">
			<div class="linear-progress-material small mb-3 mt-3 d-nonew" id="loader">
				<div class="bar bar1"></div>
				<div class="bar bar2"></div>
			</div>
			<form id="subscribe">
				<div class="form-floating mb-3">
					<input type="email" class="form-control" id="email" placeholder="name@example.com" name="email" value="<?php if ($email == 'NO') {} else {echo $email;}?>">
					<label for="email">Email address</label>
					<div class="invalid-feedback" id="e-feedback"></div>
				</div>
				<div class="form-floating mb-3">
					<input type="text" class="form-control" id="f_name" placeholder="First Name" name="first-name">
					<label for="f_name">Fist Name</label>
					<div class="invalid-feedback" id="f-feedback"></div>
				</div>
				<div class="form-floating mb-3">
					<input type="text" class="form-control" id="l_name" placeholder="Last Name" name="last-name">
					<label for="l_name">Last Name</label>
					<div class="invalid-feedback" id="l-feedback"></div>
				</div>
				<div class="form-check">
					<input class="form-check-input" type="checkbox" value="" id="check-agree">
					<label class="form-check-label" for="terms">Agree with terms & conditins <a href="<?php echo base_url('home/terms-conditions') ?>" target="_blank" class="text-primary nav-link">( Read our terms & conditions. )</a></label>
				</div>
				<input type="submit" value="Subscribe" class="btn btn-subscribe">
			</form>
		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		$("#subscribe").submit(function (e) { 
			e.preventDefault();
			$("#loader").show();
			const email = $("#email").val();
			const f_name = $("#f_name").val();
			const l_name = $("#l_name").val();
			const agree = $('#check-agree').prop('checked');

			if (email === '' || f_name === '' || l_name === '' || !agree) {
				$("#loader").hide();
				$("#status").removeClass('alert-warning');
				$("#status").addClass("alert-danger");
				$("#status").html("<strong>Someting went wrong!</strong> Please fill all inputs.");

				if (email === '') {
					$("#email").addClass('is-invalid');
					$("#e-feedback").html("Email can't be empty");
				} else {
					$("#email").removeClass('is-invalid');
					$("#e-feedback").html('');
				}
				if (f_name === '') {
					$("#f_name").addClass('is-invalid');
					$("#f-feedback").html("First name can't be empty");

				} else {
					$("#f_name").removeClass('is-invalid');
					$("#f-feedback").html('');
				}
				if (l_name === '') {
					$("#l_name").addClass('is-invalid');
					$("#l-feedback").html("Last name can't be empty");

				} else {
					$("#l_name").removeClass('is-invalid');
					$("#l-feedback").html("");
				}
				if (!agree) {
					$("#check-agree").addClass('is-invalid');
				} else {
					$("#check-agree").removeClass('is-invalid');
				}

			} else {

				$("#loader").show();
				$("#email").removeClass('is-invalid');
				$("#e-feedback").html('');
				$("#f_name").removeClass('is-invalid');
				$("#f-feedback").html('');
				$("#l_name").removeClass('is-invalid');
				$("#l-feedback").html("");
				$("#check-agree").removeClass('is-invalid');
				$.ajax({
					url: "<?php echo base_url('subscribe/add_subscriber') ?>",
					type: "POST",
					data: $("#subscribe").serialize(),
					success: function (response) {
						$("#status").removeClass('alert-warning');
						$("#status").removeClass('alert-danger');
						$("#status").removeClass('alert');
						$("#status").html(response);
						console.log('ajax Success');
						$("#loader").hide();
					},
					error: function (xhr, status, error) {
						console.log(xhr);
						console.log(status);
						console.log(error);
						$("#status").removeClass('alert-success');
						$("#status").removeClass('alert-warning');
						$("#status").addClass("alert-danger");
						$("#status").html("<strong>There is a Problem!</strong> Contact admin or Please try again later.");
						$("#loader").hide();
					}
				});
			}
		});
	});

</script>
