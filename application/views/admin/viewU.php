<div class="main mt-3">
	<div class="container shadow-sm p-3 page-item">
		<div class="d-flex justify-content-center">
			<img src="<?php echo base_url('assets/uploads').'/'. $userD->dp;?>" alt="Profile picture" class="dpU">
		</div>
		<div class="user-details">
			<div class="mt-3 mb-3">
				<label for="Name">Full Name</label>
				<input type="text" class="form-control" value="<?php echo $userD->first_name .' '. $userD->last_name; ?>" readonly>
			</div>
			<div class="mb-3">
				<label for="email">Email Address</label>
				<input type="text" class="form-control" value="<?php echo $userD->email; ?>" readonly>
			</div>
			<div class="mb-3">
				<label for="verify">Verification</label>
				<input type="text" class="form-control <?php if ($userD->verification == "verified") {echo "bg-success";}else{echo "bg-danger";}?> text-light" value="<?php echo $userD->verification ?>" readonly>
			</div>
			<div class="mb-3">
				<label for="type">Account type</label>
				<input type="text" class="form-control" value="<?php echo $userD->type; ?>" readonly>
			</div>
		</div>
	</div>
</div>
