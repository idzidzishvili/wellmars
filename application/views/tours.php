<!-- Popular Tours Area Start -->
<section class="peulis-popular-tours-area section_70">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="site-heading">
					<h2><?php echo isset($tourdetails)?$tourdetails->{'tourname_'.$this->lang->lang()}:lang('tours');?></h2>
					<p>Lorem ipsum dolor sit amet, conseetuer adipiscing elit. Aenan comdo igula eget. Aenean massa cum sociis Theme natoque.</p>
				</div>
			</div>
		</div>
		<div class="row mb-5">
			<?php foreach (isset($childTours)?$childTours:$tours as $tour):?>
				<div class="col-lg-4">
					<div class="single-popular-tour">
						<div class="popular-tour-image">
							<img src="<?php echo site_url('uploads/tours/'.$tour->filename);?>" alt="Popular Tours" />
						</div>
						<div class="popular-tour-desc">
							<div class="tour-desc-top">
								<h3><a href="<?php echo site_url('home/tour/'.$tour->id.'/'.strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $tour->tourname_en)));?>"><?php echo $tour->{'tourname_'.$this->lang->lang()}; ?></a></h3>
								<?php if(isset($tour->{'duration_'.$this->lang->lang()})):?>
									<div class="tour_duration">
										<p>
											<i class="fa fa-hourglass-half"></i>
											<?php echo $tour->{'duration_'.$this->lang->lang()}; ?>
										</p>
									</div>
								<?php endif;?>
								<div class="tour-desc-heading">
									<div class="tour-rating">
										<ul>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star"></i></li>
											<li><i class="fa fa-star-o"></i></li>
										</ul>
									</div>
									<div class="tour_feature">
										<a href="#"><i class="fa fa-plane"></i></a>
										<a href="#"><i class="fa fa-building-o"></i></a>
										<a href="#"><i class="fa fa-cutlery"></i></a>
									</div>
								</div>
							</div>
							<div class="tour-desc-bottom">
								<div class="tour-details">
									<a href="<?php echo site_url('home/tour/'.$tour->id.'/'.strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $tour->tourname_en)));?>"><i class="fa fa-flag"></i> Book Now</a>
								</div>
								<?php if(isset($tour->price)):?>
									<div class="tour-desc-price">
										<p><?php echo $tour->price; ?></p>
									</div>
								<?php endif;?>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<!-- Popular Tours Area End -->