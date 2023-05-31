<div class="main mt-3">
	<div class="page-item shadow-sm container p-3">
		<div class="accordion" id="accordionExample">
			<div class="accordion-item">
				<h2 class="accordion-header" id="headingOne">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
					Basic Updates
				</button>
				</h2>
				<div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
				<div class="accordion-body">
					<form id="sys_names">
						<div class="d-flex justify-content-center">
							<div class="spinner-border text-primary d-none" role="status" id="sys-spinner">
								<span class="visually-hidden">Loading...</span>
							</div>
						</div>
						<div class="status alert" id="basic_status"></div>
						<div class="mt-3 mb-3">
							<label for="web_name">Web site's name</label>
							<input type="text" class="form-control" value="<?php echo $system_name; ?>" placeholder="HHR SPACE" name="web_name" id="web_name">
							<div class="invalid-feedback" id="site-name-error"></div>
						</div>
						<div class="mt-3 mb-3">
							<label for="web_description">Description</label>
							<input type="text" class="form-control" value="<?php echo $description; ?>" placeholder="Web are web developers" name="description" id="description">
							<div class="invalid-feedback" id="description-error"></div>
						</div>
						<div class="mt-3 mb-3">
							<label for="phone_number">Phone number</label>
							<input type="tel" class="form-control" value="<?php echo $phone_number; ?>" placeholder="+94xxxxxxxxx" name="phone_number" id="phone_number">
							<div class="invalid-feedback" id="phone-number-error"></div>
						</div>
						<div class="mt-3 mb-3">
							<label for="address">Address</label>
							<input type="text" class="form-control" value="<?php echo $address; ?>" placeholder="Enter an address" name="address" id="address">
							<div class="invalid-feedback" id="address-error"></div>
						</div>
						<div class="mt-3 mb-3">
							<label for="email">Email Address</label>
							<input type="email" class="form-control" value="<?php echo $system_email; ?>" placeholder="example@gmail.com" name="email" id="email">
							<div class="invalid-feedback" id="email-error"></div>
						</div>
						<input type="submit" value="Update" class="btn btn-outline-primary">
					</form>
				</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="headingTwo">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
					System Images
				</button>
				</h2>
				<div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
				<div class="accordion-body">
					<form method="post" enctype="multipart/form-data" id="favicon" >
						<div class="d-flex justify-content-center">
							<div class="spinner-border text-primary d-none" role="status" id="favicon-spinner">
								<span class="visually-hidden">Loading...</span>
							</div>
						</div>
						<div class="status alert" id="favicon_status"></div>
						<div class="mt-3 mb-3">
							<label for="favicon">Favicon</label>
							<div class="favicon_pre">
								<img src="<?php echo base_url($sysfavicon); ?>" alt="favicon" class="favicon_preview shadow">
							</div>
							<input type="file" class="form-control" id="faviconup" name="userfile">
							<div class="invalid-feedback" id="feedback">The input cannot be empty.</div>
						</div>
						<input class="btn btn-outline-primary" type="submit" id="submitfavicon" value="Update favicon">
					</form>
					<hr>
					<form method="post" enctype="multipart/form-data" id="pThumbnail" >
						<div class="d-flex justify-content-center">
							<div class="spinner-border text-primary d-none" role="status" id="thumbnail-spinner">
								<span class="visually-hidden">Loading...</span>
							</div>
						</div>
						<div class="status alert" id="thumbnail_status"></div>
						<div class="mt-3 mb-3">
							<label for="Thumbnail">Post Thumbnail</label>
							<p>Show when not upload specific thumbnail for post.</p>
							<div class="favicon_pre">
								<img src="<?php echo base_url($systhumnail); ?>" alt="Thumbnail" class="favicon_preview shadow">
							</div>
							<input type="file" class="form-control" id="thumbnail" name="userfileT">
							<div class="invalid-feedback" id="feedback">The input cannot be empty.</div>
						</div>
						<input class="btn btn-outline-primary" type="submit" id="submitThumbnail" value="Update Thumbnail">
					</form>
					<hr>
					<form method="post" enctype="multipart/form-data" id="Cuserphoto" >
					<div class="d-flex justify-content-center">
							<div class="spinner-border text-primary d-none" role="status" id="cuserPhoto-spinner">
								<span class="visually-hidden">Loading...</span>
							</div>
						</div>
						<div class="status alert" id="cuserPhoto_status"></div>
						<div class="mt-3 mb-3">
							<label for="Cuserphoto">Common user DP</label>
							<p>Show when not upload specific DP for User. <span class="text-warning">Updated common user photo only apply for new users who register to site after photo updated.</span></p>
							<div class="favicon_pre">
								<img src="<?php echo base_url("assets/uploads/". $Cuserphoto); ?>" alt="Common user photo" class="favicon_preview shadow">
							</div>
							<input type="file" class="form-control" id="UserPng" name="userfileC">
							<div class="invalid-feedback" id="feedback">The input cannot be empty.</div>
						</div>
						<input class="btn btn-outline-primary" type="submit" id="submitUserpng" value="Update DP">
					</form>
				</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="headingThree">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
					SMTP details
				</button>
				</h2>
				<div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
				<div class="accordion-body">
					<form id="smtp_settings">
						<div class="d-flex justify-content-center">
							<div class="spinner-border text-primary d-none" role="status" id="smtp-spinner">
								<span class="visually-hidden">Loading...</span>
							</div>
						</div>
						<div class="status alert" id="smtp_status"></div>
						<div class="mt-3 mb-3">
							<label for="server">Server</label>
							<input type="text" class="form-control" name="server" id="server" placeholder="Please enter your SMTP server (smtp.gmail.com)" value="<?php echo $smtp_host; ?>">
							<div class="invalid-feedback" id="server-error"></div>
						</div>
						<div class="mt-3 mb-3">
							<label for="port">Port</label>
							<select class="form-select" id="port" name="port" required>
								<option value="587" <?php if ($smtp_port == "587") {echo "selected";}?>>587 (tls)</option>
								<option value="465" <?php if ($smtp_port == "465") {echo "selected";}?>>465 (ssl)</option>
							</select>
						</div>
						<div class="mt-3 mb-3">
							<label for="username">Username</label>
							<input type="text" class="form-control" name="userName" id="userName" placeholder="example@gmail.com" value="<?php echo $smtp_user; ?>">
							<div class="invalid-feedback" id="user-error"></div>
						</div>
						<div class="mt-3 mb-3">
							<label for="password">Password</label>
							<input type="password" name="passWord" id="passWord" class="form-control" placeholder="your account's password" value="<?php echo $smtp_password; ?>">
							<div class="invalid-feedback" id="pass-error"></div>
						</div>
						<input class="btn btn-outline-primary" type="submit" id="submitSmtp" value="Update SMTP settings">
					</form>
				</div>
				</div>
			</div>
			<div class="accordion-item">
				<h2 class="accordion-header" id="headingFour">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
					Telegram Settings
				</button>
				</h2>
				<div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headigFour" data-bs-parent="#accordionExample">
				<div class="accordion-body">
					<form id="telegram">
						<div class="d-flex justify-content-center">
							<div class="spinner-border text-primary d-none" role="status" id="telegram-spinner">
								<span class="visually-hidden">Loading...</span>
							</div>
						</div>
						<div class="status alert" id="telegram_status"></div>
						<div class="mt-3 mb-3">
							<label for="api">Your ChatBot's Api Token   <span class="text-secodary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title='After you create Bot using BotFater you will get your bot&apos;s api token'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/></svg></span></label>
							<input type="text" class="form-control" value="<?php echo $telegramApi; ?>" placeholder="4839574812:AAFD39kkdpWt3ywyRZergyOLMaJhac60qc" name="api" id="api">
							<div class="invalid-feedback" id="api-error"></div>
						</div>
						<div class="mt-3 mb-3">
							<label for="web_description">Chat Id  <span class="text-secodary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title='Please enter your Channel or Group username that start with "@". If you can not find it please check your invitation link chat id must be there after "t.me/". Please enter chat id with @'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/></svg></span></label>
							<input type="text" class="form-control" value="<?php echo $telegram_ChatId;  ?>" placeholder="@username" name="chatId" id="chatId">
							<div class="invalid-feedback" id="chatId-error"></div>
						</div>
						<input type="submit" value="Update" class="btn btn-outline-primary">
					</form>
				</div>
				</div>
			</div>

			<div class="accordion-item">
				<h2 class="accordion-header" id="headingFive">
				<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
					Payment Settings
				</button>
				</h2>
				<div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headigFive" data-bs-parent="#accordionExample">
				<div class="accordion-body">
					<form id="paymentPaypal">
						<div class="d-flex justify-content-center">
							<div class="spinner-border text-primary" role="status" id="paypal-spinner" style="display: none;">
								<span class="visually-hidden">Loading...</span>
							</div>
						</div>
						<div class="status alert" id="paypal_status"></div>
						<div class="mt-3 mb-3">
							<label for="clientId">Paypal Client ID <span class="text-secodary" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title='Enter your paypal client ID'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/></svg></span></label>
							<input type="text" class="form-control" value="<?php echo $clientID; ?>" placeholder="4839574812:AAFD39kkdpWt3ywyRZergyOLMaJhac60qc" name="clientId" id="clientId">
							<div class="invalid-feedback" id="clientId-error"></div>
						</div>
						<input type="submit" value="Update" class="btn btn-outline-primary">
					</form>
				</div>
				</div>
			</div>

		</div>
	</div>
</div>
<script>
	$(document).ready(function () {
		$("#paymentPaypal").submit(function (e) { 
			e.preventDefault();
			var clientId = $("#clientId").val();
			if (clientId.length < 5) {
				$("#clientId").addClass("is-invalid");
				$("#clientId-error").html("Please enter valid client ID");
			} else {
				$("#clientId").removeClass("is-invalid");
				$("#clientId-error").html("");
				$("#paypal-spinner").show();
				var formData = $('#paymentPaypal').serialize();

				$.ajax({
					url: "<?php echo base_url('admin/updatepaymentPaypal') ?>",
					type: "POST",
					data: formData,
					dataType: "html",
					success: function(response) {
						console.log('Ajax success');
						$('#paypal_status').html(response);
						$("#paypal-spinner").hide();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.log('Error: ' + jqXHR);
						console.log('Error: ' + textStatus);
						console.log('Error: ' + errorThrown);
						$('#paypal_status').addClass('alert-danger');
						$('#paypal_status').html('<strong>Sorry!</strong> Something went wrong! Please try again later.');
						$("#paypal-spinner").hide();
					}
				});
			}
		});
	});
	$(document).ready(function () {
		$("#sys_names").submit(function (e) { 
			e.preventDefault();
			var site_name = $("#web_name").val();
			var description = $("#description").val();
			var phoneNumber = $("#phone_number").val();
			var address = $("#address").val();
			var email = $("#email").val();
			if (site_name == "" || description == "" || phoneNumber == "" || address == "" || email == "") {
				if (site_name == "") {
					$("#web_name").addClass("is-invalid");
					$("#site-name-error").html("Site name can not be empty.");
				} else {
					$("#web_name").removeClass("is-invalid");
					$("#site-name-error").html("");
				}
				if (description == "") {
					$("#description").addClass("is-invalid");
					$("#description-error").html("Description can not be empty.");
				} else {
					$("#description").removeClass("is-invalid");
					$("#description-error").html("");
				}
				if (phoneNumber == "") {
					$("#phone_number").addClass("is-invalid");
					$("#phone-number-error").html("Phone number can not be empty.");
				} else {
					$("#phone_number").removeClass("is-invalid");
					$("#phone-number-error").html("");
				}
				if (address == "") {
					$("#address").addClass("is-invalid");
					$("#address-error").html("Address can not be empty.");
				} else {
					$("#address").removeClass("is-invalid");
					$("#address-error").html("");
				}
				if (email == "") {
					$("#email").addClass('is-invalid');
					$("#email-error").html("Email can't be empty.");
				} else {
					$("#email").removeClass('is-invalid');
					$("#email-error").html("");
				}
				
			} else {
				$("#web_name").removeClass("is-invalid");
				$("#site-name-error").html("");
				$("#description").removeClass("is-invalid");
				$("#description-error").html("");
				$("#address").removeClass("is-invalid");
				$("#address-error").html("");
				if (!isValidEmail(email) || phoneNumber.length < 10) {
					if (!isValidEmail(email)) {
						$("#email").addClass('is-invalid');
						$("#email-error").html("This can't be email. (Not match with email format)");
					
					} else {
						$("#email").removeClass('is-invalid');
						$("#email-error").html("");
					}
					if (phoneNumber.length < 10) {
						$("#phone_number").addClass("is-invalid");
						$("#phone-number-error").html("Phone number must be 10 digits.");
					} else {
						$("#phone_number").removeClass("is-invalid");
						$("#phone-number-error").html("");
					}
				} else {
					$("#phone_number").removeClass("is-invalid");
					$("#phone-number-error").html("");
					$("#email").removeClass('is-invalid');
					$("#email-error").html("");
					$("#sys-spinner").show();
					var formData = $('#sys_names').serialize();

					$.ajax({
						url: "<?php echo base_url('admin/updateBasicsettings') ?>",
						type: "POST",
						data: formData,
						dataType: "html",
						success: function(response) {
							console.log('Ajax success');
							$('#basic_status').html(response);
							$("#sys-spinner").hide();
						},
						error: function(jqXHR, textStatus, errorThrown) {
							console.log('Error: ' + jqXHR);
							console.log('Error: ' + textStatus);
							console.log('Error: ' + errorThrown);
							$('#basic_status').addClass('alert-danger');
							$('#basic_status').html('<strong>Sorry!</strong> Something went wrong! Please try again later.');
							$("#sys-spinner").hide();
						}
					});
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
	$(document).ready(function () {
		$("#smtp_settings").submit(function (e) { 
			e.preventDefault();
			var smtpHost = $("#server").val();
			var smtpPort = $("#port").val();
			var smtpUser = $("#userName").val();
			var smtpPass = $("#passWord").val();

			if (smtpHost == "" || smtpPort == "" || smtpUser == "" || smtpPass == "") {
				$("#smtp_status").addClass("alert-danger");
				$("#smtp_status").html("If you're not set these settings emails won't send.");
				if (smtpHost == "") {
					$("#server").addClass("is-invalid");
					$("#server-error").html("Smtp Server cannot be empty.");
				} else {
					$("#server").removeClass("is-invalid");
					$("#server-error").html("");
				}
				if (smtpPort == "") {
					$("#port").addClass("is-invalid");
				} else {
					$("#port").removeClass("is-invalid");
				}
				if (smtpUser == "") {
					$("#userName").addClass("is-invalid");
					$("#user-error").html("Smtp Server cannot be empty.");
				} else {
					$("#userName").removeClass("is-invalid");
					$("#user-error").html("");
				}
				if (smtpPass == "") {
					$("#passWord").addClass("is-invalid");
					$("#pass-error").html("Smtp Server cannot be empty.");
				} else {
					$("#passWord").removeClass("is-invalid");
					$("#pass-error").html("");
				}
			} else {
				$("#passWord").removeClass("is-invalid");
				$("#pass-error").html("");
				$("#userName").removeClass("is-invalid");
				$("#user-error").html("");
				$("#port").removeClass("is-invalid");
				$("#server").removeClass("is-invalid");
				$("#server-error").html("");
				$("#smtp_status").removeClass("alert-danger");
				$("#smtp_status").html("");
				var formDataSmtp = $('#smtp_settings').serialize();
				$("#smtp-spinner").show();

				$.ajax({
					url: "<?php echo base_url('admin/updateSmtp') ?>",
					type: "POST",
					data: formDataSmtp,
					dataType: "html",
					success: function(response) {
						console.log('Ajax success');
						$('#smtp_status').html(response);
						$("#smtp-spinner").hide();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						console.log('Error: ' + jqXHR);
						console.log('Error: ' + textStatus);
						console.log('Error: ' + errorThrown);
						$('#smtp_status').addClass('alert-danger');
						$('#smtp_status').html('<strong>Sorry!</strong> Something went wrong! Please try again later.');
						$("#smtp-spinner").hide();
					}
				});
			}
		});
	});
	$(document).ready(function () {
		$("#telegram").submit(function (e) { 
			e.preventDefault();
			var token = $("#api").val();
			var chatId = $("#chatId").val();

			if (token == "" || chatId == "") {
				$("#telegram_status").addClass("alert-danger");
				$("#telegram_status").html("If you're not set Token and chat id, that means you cannot send messages through telegram ");
				if (token == "") {
					$("#api").addClass("is-invalid");
					$("#api-error").html("Api token cannot be empty.");
				} else {
					$("#api").removeClass("is-invalid");
					$("#api-error").html("");
				}
				if (chatId == "") {
					$("#chatId").addClass("is-invalid");
					$("#chatId-error").html("Chat id cannot be empty.");
				} else {
					$("#chatId").removeClass("is-invalid");
					$("#chatId-error").html("");
				}
			} else {
				if (chatId.charAt(0) === '@') {
					console.log('Input starts with @');
					$("#telegram_status").removeClass("alert-danger");
					$("#telegram_status").html("");
					$("#api").removeClass("is-invalid");
					$("#api-error").html("");
					$("#chatId").removeClass("is-invalid");
					$("#chatId-error").html("");
					var formDataTelegram = $('#telegram').serialize();
					$("#telegram-spinner").show();

					$.ajax({
						url: "<?php echo base_url('admin/updateTelegram') ?>",
						type: "POST",
						data: formDataTelegram,
						dataType: "html",
						success: function(response) {
							console.log('Ajax success');
							$('#telegram_status').html(response);
							$("#telegram-spinner").hide();
						},
						error: function(jqXHR, textStatus, errorThrown) {
							console.log('Error: ' + jqXHR);
							console.log('Error: ' + textStatus);
							console.log('Error: ' + errorThrown);
							$('#telegram_status').addClass('alert-danger');
							$('#telegram_status').html('<strong>Sorry!</strong> Something went wrong! Please try again later.');
							$("#telegram-spinner").hide();
						}
					});
					
				} else {
					console.log('Input does not start with @');
					$("#chatId").addClass("is-invalid");
					$("#chatId-error").html("Chat id start  with @");
				}
			}
		});
	});
	$(document).ready(function () {
		$("#favicon").submit(function (e) { 
			e.preventDefault();
			$("#favicon-spinner").show();
			var formDataFavicon = new FormData($("#favicon")[0]);
			$.ajax({
				url: '<?php echo base_url("admin/updatefavicon"); ?>',
				type: 'POST',
				data: formDataFavicon,
				async: false,
				cache: false,
				contentType: false,
				processData: false,
				success: function(response) {
					console.log('Ajax success');
					$('#favicon_status').html(response);
					$("#favicon-spinner").hide();
				},
				error: function(jqXHR, textStatus, errorThrown) {
					$('#favicon_status').addClass('alert-danger');
					$('#favicon_status').html('<strong>Sorry!</strong> Something went wrong! Please try again later.');
					$("#favicon-spinner").hide();
					console.log('Error: ' + jqXHR);
					console.log('Error: ' + textStatus);
					console.log('Error: ' + errorThrown);
					
				}
			});
		});
	});
	$(document).ready(function () {
		$("#pThumbnail").submit(function (e) { 
			e.preventDefault();
			$("#thumbnail-spinner").show();
			var formDataThumb = new FormData($("#pThumbnail")[0]);
			$.ajax({
				url: '<?php echo base_url("admin/updatepThumbnail"); ?>',
				type: 'POST',
				data: formDataThumb,
				async: false,
				cache: false,
				contentType: false,
				processData: false,
				success: function(response) {
					console.log('Ajax success');
					$('#thumbnail_status').html(response);
					$("#thumbnail-spinner").hide();
				},
				error: function(jqXHR, textStatus, errorThrown) {
					$('#thumbnail_status').addClass('alert-danger');
					$('#thumbnail_status').html('<strong>Sorry!</strong> Something went wrong! Please try again later.');
					$("#thumbnail-spinner").hide();
					console.log('Error: ' + jqXHR);
					console.log('Error: ' + textStatus);
					console.log('Error: ' + errorThrown);
					
				}
			});
		});
	});
	$(document).ready(function () {
		$("#Cuserphoto").submit(function (e) { 
			e.preventDefault();
			$("#cuserPhoto-spinner").show();
			var formDataThumb = new FormData($("#Cuserphoto")[0]);
			$.ajax({
				url: '<?php echo base_url("admin/updateCuserphoto"); ?>',
				type: 'POST',
				data: formDataThumb,
				async: false,
				cache: false,
				contentType: false,
				processData: false,
				success: function(response) {
					console.log('Ajax success');
					$('#cuserPhoto_status').html(response);
					$("#cuserPhoto-spinner").hide();
				},
				error: function(jqXHR, textStatus, errorThrown) {
					$('#cuserPhoto_status').addClass('alert-danger');
					$('#cuserPhoto_status').html('<strong>Sorry!</strong> Something went wrong! Please try again later.');
					$("#cuserPhoto-spinner").hide();
					console.log('Error: ' + jqXHR);
					console.log('Error: ' + textStatus);
					console.log('Error: ' + errorThrown);
					
				}
			});
		});
	});
</script>
