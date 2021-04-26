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
		<title>Wellmars</title>
		<!-- Favicon -->
		<link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/bootstrap.css">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/font-awesome.min.css">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/flaticon/flaticon.css">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/jquery.animatedheadline.css">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/magnific-popup.css">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/owl.carousel.min.css">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/owl.theme.default.min.css">
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/animate.min.css">
		<!--Datepicker css-->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/jquery.datepicker.css">
		<!--Nice Select css-->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/nice-select.css">
		<!--Slicknav css-->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/slicknav.min.css">
		<!--Site Main Style css-->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
		<!--Responsive css-->
		<link rel="stylesheet" href="<?= base_url(); ?>assets/css/responsive.css">
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
								<p>
									<i class="fa fa-envelope"></i>
									info@example.com
								</p>
								<p>
									<i class="fa fa-phone"></i>
									1 562 867 5309
								</p>
							</div>
						</div>
						<div class="col-lg-6 col-sm-6">
							<div class="header-top-right">
								<div class="header-top-social">
									<ul>
										<li><a href="#"><i class="fa fa-facebook"></i></a></li>
										<li><a href="#"><i class="fa fa-twitter"></i></a></li>
										<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
										<li><a href="#"><i class="fa fa-instagram"></i></a></li>
									</ul>
								</div>
								<div class="header-top-auth">
									<ul>
										<li><a href="<?php echo base_url('lang/ge');?>"><img src="<?php echo base_url('assets/img/ge.svg');?>" alt="Switch to Georgian" /></a></li>
										<li><a href="<?php echo base_url('lang/en');?>"><img src="<?php echo base_url('assets/img/en.svg');?>" alt="Switch to English" /></a></li>
										<li><a href="<?php echo base_url('lang/ru');?>"><img src="<?php echo base_url('assets/img/ru.svg');?>" alt="Switch to Russian" /></a></li>
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
								<div class="row">
									<div class="col-lg-3">
										<div class="site-logo">
											<a href="<?php echo base_url('/');?>">
												<img src="<?= base_url(); ?>assets/img/logo.png" alt="Peulis" />
											</a>
										</div>
										<!-- Responsive Menu Start -->
										<div class="peulis-responsive-menu"></div>
										<!-- Responsive Menu End -->
									</div>
									<div class="col-lg-7">
										<div class="mainmenu">
											<nav>
												<ul id="navigation_menu">
													<li>
														<a href="<?php echo base_url('home/hotels/');?>"><?php echo $this->lang->line('hotels');?></a>
													</li>

													<li>
														<a href="#"><?php echo $this->lang->line('tours');?></a>
														<ul>
															<?php foreach($tours as $tour) : ?>
																<li><a href="<?php echo base_url('home/subtours/'.$tour->id);?>"><?php echo $tour->{'tourname_'.$lang}; ?></a></li>
															<?php endforeach; ?>
														</ul>
													</li>
													<li>
														<a href="#">Destinations</a>
														<ul>
															<li><a href="destination-three.html">Destination 3 columns</a></li>
															<li><a href="destination-four.html">Destination 4 columns</a></li>
															<li><a href="destination-single.html">Single Destination</a></li>
														</ul>
													</li>
													<li>
														<a href="#">tours</a>
														<ul>
															<li><a href="tour-sidebar.html">Tour Sidebar</a></li>
															<li><a href="tour-details.html">Tour Details</a></li>
														</ul>
													</li>
													<li>
														<a href="#">Blog</a>
														<ul>
															<li><a href="blog.html">Blog With Sidebar</a></li>
															<li><a href="single-blog.html">Blog Details</a></li>
														</ul>
													</li>
													<li>
														<a href="#">Shop</a>
														<ul>
															<li><a href="product.html">Product</a></li>
															<li><a href="single-product.html">Product Details</a></li>
															<li><a href="cart.html">Shoping Cart</a></li>
															<li><a href="checkout.html">Checkout</a></li>
														</ul>
													</li>
													<li><a href="contact.html">Contact</a></li>
												</ul>
											</nav>
										</div>
									</div>
									<div class="col-lg-2">
										<div class="header_action">
											<ul>
												<li class="header-search">
													<a href="#" class="search-btn">
														<i class="fa fa-search"></i>
													</a>
													<div class="search-box search-elem">
														<span class="search-close"></span>
														<div class="inner row">
															<form>
																<input type="search" placeholder="Type to Search...">
																<button type="submit"><i class="fa fa-search"></i></button>
															</form>
														</div>
													</div>
												</li>
												<li class="header_cart">
													<a href="#">
														<span>0</span>
														<i class="fa fa-shopping-bag"></i>
													</a>
													<div class="cart_box_hover">
														<div class="single-cart">
															<a class="product-remove" href="#">
																<i class="fa fa-times"></i>
															</a>
															<div class="cart-pro-image">
																<img src="assets/img/cart-1.png" alt="cart" />
															</div>
															<div class="cart-pro-info">
																<a href="#">
																	<h4>Tour package 1</h4>
																</a>
																<p>Tickets 2</p>
																<h5>$1650.00</h5>
															</div>
														</div>
														<div class="single-cart">
															<a class="product-remove" href="#">
																<i class="fa fa-times"></i>
															</a>
															<div class="cart-pro-image">
																<img src="assets/img/cart-1.png" alt="cart" />
															</div>
															<div class="cart-pro-info">
																<a href="#">
																	<h4>Tour package 1</h4>
																</a>
																<p>Tickets 2</p>
																<h5>$1650.00</h5>
															</div>
														</div>
														<div class="single-cart subtotal">
															<p>Subtotal :<span>$3300</span></p>
														</div>
														<div class="cart-action">
															<a href="cart.html" class="viewcart">view cart</a>
															<a href="checkout.html" class="checkout-btn">Checkout</a>
														</div>
													</div>
												</li>
												<li><a href="#" id="sidenav-toggle"><i class="fa fa-bars"></i></a></li>
											</ul>
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