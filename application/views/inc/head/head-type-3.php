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
	<link rel="stylesheet" href="<?php echo base_url('assets/css/stylesheetA.css') ?>">
</head>
<body>
<header class="py-3 mb-3 border-bottom page-item">
    <div class="container-fluid d-grid gap-3 align-items-center" style="grid-template-columns: 1fr 2fr;">
      <div class="dropdown">
        <a href="#" class="d-flex align-items-center col-lg-4 mb-2 mb-lg-0 link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="<?php echo $favicon; ?>" alt="Web front pic" class="Dp">
        </a>
        <ul class="dropdown-menu text-small shadow">
          <li><a class="dropdown-item active" href="<?php echo base_url('admin/dashboard') ?>" aria-current="page">Dashboard</a></li>
          <li><a class="dropdown-item" href="#">Create a post</a></li>
        </ul>
      </div>

      <div class="d-flex align-items-center">
        <form class="w-100 me-3" role="search">
          <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
        </form>

        <div class="flex-shrink-0 dropdown">
          <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle Dp">
          </a>
          <ul class="dropdown-menu text-small shadow">
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?php echo base_url('user/logout') ?>">Sign out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>
