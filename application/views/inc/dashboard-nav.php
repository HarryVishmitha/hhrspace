<div class="navigations mt-3">
	<div class="d-flex justify-content-center">
		<div class="page-item shadow-sm sidebar w-100">
			<div class="nav-background">
				<div class="d-flex justify-content-center align-items-center">
					<div class="avatar dp mt-3">
						<img src="<?php echo base_url('assets/uploads/'. $userData->dp) ?>" alt="Profile picture" width="32" height="32" class="rounded-circle Dp" style="width: 60px; height: 60px;">
						<div class="user-name text-secondary mt-2"><?php echo $userData->first_name . ' ' . $userData->last_name;  ?></div>
						<div class="text-secondary mt-1"><?php if ($userData->type == "admin") {echo "Admin";} elseif ($userData->type == "author") {echo "Author";} elseif ($userData->type == "user") {echo "Member";}?></div>
					</div>
				</div>
				<hr>
				<div class="flex-shrink-0 p-3 bg-white">
					<ul class="nav nav-pills mb-auto">
						<li class="navbar-brand h1" style="text-decoration: underline;    color: #6c757d;">Navigation</li>
						<li class="nav-item">
							<a href="<?php echo base_url('admin/dashboard') ?>" class="nav-link link-dark"><i class="fa fa-dashboard"> </i> Dashboard</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('admin/post') ?>" class="nav-link link-dark"><i class="fa fa-solid fa-plus"> </i> Posts</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('admin/image_lib') ?>" class="nav-link link-dark"><i class="fas fa-image"> </i> Image library</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('admin/add_user') ?>" class="nav-link link-dark"><i class="fas fa-user-plus"> </i> Users</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('admin/premium') ?>" class="nav-link link-dark"><i class="fas fa-money-bill"> </i> Premium Content</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('admin/notification') ?>" class="nav-link link-dark"><i class="fas fa-solid fa-bullhorn"> </i> Send Notification</a>
						</li>
						<li class="nav-item">
							<a href="<?php echo base_url('admin/setting') ?>" class="nav-link link-dark"><i class="fas fa-cog"> </i> Settings</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
