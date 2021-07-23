

<!-- Footer Area Start -->
<footer class="peulis-footer-area">
	<div class="footer-top-area">
		<div class="container">
			<div class="row">
				<!-- <div class="col-lg-3 col-sm-6">
					<div class="single-footer">
						<p>ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.ipsum dolor sit amet, consectetur </p>
						<div class="footer-logo">
							<a href="index.html">
								<img src="assets/img/footer-logo.png" alt="Peulis" />
							</a>
						</div>
					</div>
				</div> -->
				<div class="col-lg-4 col-sm-6">
					<div class="single-footer">
						<h3><?php echo lang('pages');?></h3>
						<ul>
							<li><a href="<?php echo site_url('home/hotels');?>"><i class="fas fa-bed mr-2"></i><?php echo lang('hotels');?></a></li>
							<li><a href="<?php echo site_url('home/tours');?>"><i class="fas fa-biking mr-2"></i><?php echo lang('tours');?></a></li>
							<li><a href="<?php echo site_url('home/gallery');?>"><i class="fas fa-images mr-2"></i><?php echo lang('gallery');?></a></li>
							<li><a href="<?php echo site_url('home/autopark');?>"><i class="fas fa-car mr-2"></i><?php echo lang('autopark');?></a></li>
							<li><a href="<?php echo site_url('home/contact');?>"><i class="far fa-address-book mr-2"></i><?php echo lang('contact');?></a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="single-footer">
						<h3><?php echo lang('contact');?></h3>
						<ul>
							<li><i class="fa fa-phone mr-3"></i><?php echo $contacts->phone;?></li>
							<li><i class="fa fa-envelope mr-3"></i><?php echo $contacts->email;?></li>
							<li><i class="fa fa-map-marker mr-3"></i><?php echo $contacts->{'address_'.$this->lang->lang()};?></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4 col-sm-6">
					<div class="single-footer socials">
						<h3><?php echo lang('socialLinks');?></h3>
						<p>
							<?php if(isset($contacts->facebook) && strlen($contacts->facebook)):?>
								<a href="<?php echo $contacts->facebook;?>" target="_blank"><i class="fab fa-facebook-f"></i></a>
							<?php endif;?>
							<?php if(isset($contacts->twitter) && strlen($contacts->twitter)):?>
								<a href="<?php echo $contacts->twitter;?>" target="_blank"><i class="fab fa-twitter"></i></a>
							<?php endif;?>
							<?php if(isset($contacts->pinterest) && strlen($contacts->pinterest)):?>
								<a href="<?php echo $contacts->pinterest;?>" target="_blank"><i class="fab fa-pinterest"></i></a>
							<?php endif;?>
							<?php if(isset($contacts->instagram) && strlen($contacts->instagram)):?>
								<a href="<?php echo $contacts->instagram;?>" target="_blank"><i class="fab fa-instagram"></i></a>
							<?php endif;?>
						</p>
						<!-- <div class="payment_image">
							<img src="assets/img/creditcard-logo.png" alt="Payment Card" />
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- Footer Area End -->



<!--Jquery js-->

<!-- Popper JS -->
<script src="<?= base_url(); ?>assets/js/popper.min.js"></script>
<!--Bootstrap js-->
<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>
<!--Owl-Carousel js-->
<script src="<?= base_url(); ?>assets/js/owl.carousel.min.js"></script>
<!--Animatedheadline js-->
<script src="<?= base_url(); ?>assets/js/jquery.animatedheadline.min.js"></script>
<!--Slicknav js-->
<script src="<?= base_url(); ?>assets/js/jquery.slicknav.min.js"></script>
<!--Magnific js-->
<script src="<?= base_url(); ?>assets/js/jquery.magnific-popup.min.js"></script>
<!-- Datepicker -->
<script src="<?= base_url(); ?>assets/js/jquery.datepicker.min.js"></script>
<!--Nice Select js-->
<script src="<?= base_url(); ?>assets/js/jquery.nice-select.min.js"></script>
<!-- Way Points JS -->
<script src="<?= base_url(); ?>assets/js/waypoints-min.js"></script>
<!--Main js-->

<script src="<?= base_url(); ?>assets/js/main.js"></script>

<script></script>
</body>

</html>