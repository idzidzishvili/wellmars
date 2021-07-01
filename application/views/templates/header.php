	<!DOCTYPE html>
	<html lang="en-US">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Peulis | Travel Agency & Tourism HTML Template">
		<meta name="keyword" content="travel, tourism, agency, tourist">
		<meta name="author" content="Themescare">
		<!-- Title -->
		<title>Wellmars <?php echo isset($title)?' | '.$title:'';?></title>
		<!-- Favicon -->
		<link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.css">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/flaticon/flaticon.css">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/jquery.animatedheadline.css">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/magnific-popup.css">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/owl.theme.default.min.css">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/animate.min.css">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/jquery.datepicker.css">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/nice-select.css">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/slicknav.min.css">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/firago.css">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/daterangepicker.css">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/responsive.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
		<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
		<script src="<?= base_url(); ?>assets/js/moment.js"></script>
		<script src="<?= base_url(); ?>assets/js/daterangepicker.js"></script>
	</head>
	<body>
		<!-- Header Area Start -->
		<header class="peulis-header-area">
			<!-- Header Top Area Start -->
			<div class="header-top-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-sm-6">
							<div class="header-top-left">
								<?php if (isset($contacts->email)):?>
									<p>
										<i class="fa fa-envelope"></i>
										<?php echo $contacts->email;?>
									</p>
								<?php endif;?>
								<?php if (isset($contacts->phone)):?>
									<p>
										<i class="fa fa-phone"></i>
										<?php echo $contacts->phone;?>
									</p>
								<?php endif;?>
							</div>
						</div>
						<div class="col-lg-6 col-sm-6">
							<div class="header-top-right">
								<div class="header-top-social">
									<ul>
										<?php if(isset($contacts->facebook) && strlen($contacts->facebook)):?>
											<li><a href="<?php echo $contacts->facebook;?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
										<?php endif;?>
										<?php if(isset($contacts->twitter) && strlen($contacts->twitter)):?>
											<li><a href="<?php echo $contacts->twitter;?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
										<?php endif;?>
										<?php if(isset($contacts->pinterest) && strlen($contacts->pinterest)):?>
											<li><a href="<?php echo $contacts->pinterest;?>" target="_blank"><i class="fab fa-pinterest"></i></a></li>
										<?php endif;?>
										<?php if(isset($contacts->instagram) && strlen($contacts->instagram)):?>
											<li><a href="<?php echo $contacts->instagram;?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
										<?php endif;?>
									</ul>
								</div>
								<div class="header-top-auth">
									<ul>										
										<li><a href="<?php echo site_url('auth/login');?>"><i class="fas fa-user"></i></a></li>
										<li><a href="<?php echo site_url('auth/register');?>"><i class="fas fa-user-plus"></i></a></li>										
										<li><?php echo anchor($this->lang->switch_uri('ge'), '<img src="'.base_url('assets/img/ge.svg').'">');?></li>
										<li><?php echo anchor($this->lang->switch_uri('en'), '<img src="'.base_url('assets/img/en.svg').'">');?></li>
										<li><?php echo anchor($this->lang->switch_uri('ru'), '<img src="'.base_url('assets/img/ru.svg').'">');?></li>
									</ul>
								</div>
							</div>
						</div>
               </div>
				</div>
			</div>
			<!-- Header Top Area End -->

			<!-- Main Header Area Start -->
			<div class="main-header-area">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="header_inn">
								<div class="row bg-white">
									<div class="col-lg-3">
										<div class="site-logo">
											<a href="<?php echo site_url('/');?>">
												<img src="<?= base_url(); ?>assets/img/logo.png" alt="wellmars logo" />
											</a>
										</div>
										<!-- Responsive Menu Start -->
										<div class="peulis-responsive-menu"></div>
										<!-- Responsive Menu End -->
									</div>
									<div class="col-lg-9">
										<div class="mainmenu">
											<nav>
												<ul id="navigation_menu">
													<li>
														<a href="<?php echo site_url('home/hotels/');?>"><?php echo $this->lang->line('hotels');?></a>
													</li>
													<li>
														<a href="#"><?php echo $this->lang->line('tours');?></a>
														<ul>
															<?php foreach($tours as $tour):?>
																<li>
																	<a href="<?php echo site_url	('home/tour/'.$tour->id.'/'.strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $tour->tourname_en)));?>">
																		<?php echo $tour->{'tourname_'.$this->lang->lang()}; ?>
																	</a>
																</li>
															<?php endforeach;?>
														</ul>
													</li>
													<li>
														<a href="<?php echo site_url('home/gallery');?>"><?php echo $this->lang->line('gallery');?></a>
													</li>
													<li>
														<a href="<?php echo site_url('contact');?>"><?php echo lang('contact');?></a>
													</li>
												</ul>
											</nav>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- Main Header Area End -->
		</header>
		<!-- Header Area End -->