<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?php echo $favicon; ?>" type="image/x-icon">
	<title><?php echo $page . ' | ' . $site_name ?></title>
	<!-- Bootstrap 5 -->
	<link rel="stylesheet" href="<?php echo  base_url('assets/bootstrap/css/bootstrap.min.css') ?>">
	<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
	<!-- Fontawesome -->
	<script src="https://kit.fontawesome.com/9d3f75581e.js" crossorigin="anonymous"></script>
	<!-- Google icons-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<!-- jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/stylesheet.css') ?>">
</head>
<body>
<div class="container-fluid page-item shadow-sm sticky-top">
  <header class="blog-header lh-1 py-3">
		<div class="text-center d-lg-none d-md-none">
			<div class="d-flex justify-content-between">
				<a class="blog-header-logo text-body-emphasis text-decoration-none" href="<?php echo base_url() ?>"><?php echo $site_name ?></a>
				<button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
					<span class="fas fa-bars fa-spin"></span>
				</button>
			</div>

			<div class="collapse" id="collapseExample">
				<div class="card card-body mt-3">
					<nav class="nav d-flex justify-content-between flex-column">
						<?php 
							if ($this->session->userdata('loggedIn')) {
								?>
								<a class="btn btn-sm btn-outline-warning" href="<?php echo base_url('user/logout');?>">Sign out</a>
								<?php
							} else {
							?>
								<a class="btn btn-sm btn-outline-secondary" href="<?php echo base_url('user/login');?>">Sign in</a>
							<?php
							}
							
						?>
						<a class="p-2 link-secondary nav-link active" href="<?php echo base_url()?>">Home</a>
							<?php
								foreach ($pages as $pagesN) {
								?>
								<a class="p-2 link-secondary nav-link" href="<?php echo base_url('p/'. $pagesN->page_url);?>"><?php echo $pagesN->page_name ?></a>
								<?php
								}
							?>
					</nav>
				</div>
			</div>

		</div>
    <div class="row flex-nowrap justify-content-between align-items-center  d-none d-lg-flex d-md-flex">
      <div class="col-4 pt-1 d-none d-lg-block d-md-block">
        <a class="btn btn-subscribe" href="<?php echo base_url('subscribe') ?>">Subscribe</a>
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-body-emphasis text-decoration-none" href="<?php echo base_url() ?>"><?php echo $site_name ?></a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center d-none d-lg-flex d-md-flex">
        <a class="link-secondary" href="#" aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
        </a>
		<?php 
			if ($this->session->userdata('loggedIn')) {
				?>
				<a class="btn btn-sm btn-outline-warning" href="<?php echo base_url('user/logout');?>">Sign out</a>
				<?php
			} else {
			?>
				<a class="btn btn-sm btn-outline-secondary" href="<?php echo base_url('user/login');?>">Sign in</a>
			<?php
			}
			
		?>
        
      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2 d-none d-lg-block d-md-block">
    <nav class="nav d-flex justify-content-between">
      	<a class="p-2 link-secondary nav-link active" href="<?php echo base_url()?>">Home</a>
		<?php
			foreach ($pages as $pages) {
			?>
			<a class="p-2 link-secondary nav-link" href="<?php echo base_url('p/'. $pages->page_url);?>"><?php echo $pages->page_name ?></a>
			<?php
			}
		?>
    </nav>
  </div>
</div>

