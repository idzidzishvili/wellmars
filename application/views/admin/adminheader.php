<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="M. Marsagishvili">
	<title>Wellmars Admin</title>
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/summernote-bs4.min.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/firago.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css" type="text/css" />
	<link rel="stylesheet" href="<?= base_url(); ?>assets/css/dashboard.css" type="text/css" />
	<script src="<?= base_url(); ?>assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="<?= base_url(); ?>assets/js/popper.min.js" type="text/javascript"></script>
	<script src="<?= base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?= base_url(); ?>assets/js/summernote-bs4.min.js" type="text/javascript"></script>
	
</head>

<body>
	<nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
		<a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Wellmars Admin</a>
		<button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<ul class="navbar-nav px-3">
			<li class="nav-item text-nowrap">
				<a class="nav-link" href="<?php echo base_url('auth/logout'); ?>"><?= $this->lang->line("logout"); ?></a>
			</li>
		</ul>
	</nav>

	<div class="container-fluid">
		<div class="row">
			<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
				<div class="sidebar-sticky pt-3">
					<ul class="nav flex-column">
						<li class="nav-item">
							<a class="nav-link <?php echo $activeitem == 4 ? 'active' : ''; ?>" href="<?php echo base_url('admin/sliders'); ?>">
								<i class="la la-calendar"></i>
								სლაიდერი
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php echo $activeitem == 10 ? 'active' : ''; ?>" href="<?php echo base_url('admin/slidertext'); ?>">
							<i class="las la-text-width"></i>
								ტექსტი სლაიდერზე 
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php echo ($activeitem == 1) ? 'active' : ''; ?>" href="<?php echo base_url('admin'); ?>">
								<i class="la la-user"></i>
								ტურები
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php echo $activeitem == 2 ? 'active' : ''; ?>" href="<?php echo base_url('admin/addtour'); ?>">
								<i class="la la-user-plus"></i>
								ტურის დამატება
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php echo ($activeitem == 5) ? 'active' : ''; ?>" href="<?php echo base_url('admin/hotels'); ?>">
								<i class="la la-user"></i>
								სასტუმროები
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php echo $activeitem == 6 ? 'active' : ''; ?>" href="<?php echo base_url('admin/addHotel'); ?>">
								<i class="la la-user-plus"></i>
								სასტუმროს დამატება
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php echo $activeitem == 9 ? 'active' : ''; ?>" href="<?php echo base_url('admin/roomtypes'); ?>">
								<i class="la la-user-plus"></i>
								სასტუმროს ტიპები
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php echo $activeitem == 7 ? 'active' : ''; ?>" href="<?php echo base_url('admin/hotelreservations'); ?>">
								<i class="la la-user-plus"></i>
								სასტუმროს ჯავშნები
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link <?php echo $activeitem == 8 ? 'active' : ''; ?>" href="<?php echo base_url('admin/contact'); ?>">
								<i class="la la-user-plus"></i>
								კონტაქტი
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo base_url('auth/logout'); ?>">
								<i class="la la-share-square"></i>
								<?= $this->lang->line("logout"); ?>
							</a>
						</li>
					</ul>
				</div>
			</nav>