<?php $this->load->view('templates/header'); ?>


	<!-- Slider Area Start -->
	<section class="peulis-slider-area overlay">
		<div class="peulis-slide owl-carousel">
			<?php foreach ($slides as $slide): ?>
				<div class="slider-container" >
					<div class="single-slider zoom" style="background: url(<?php echo base_url('uploads/slider/'.$slide->filename); ?>)"></div>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="banner-area">
			<div class="banner-caption">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-sm-12 content-home">
									<div class="banner-welcome">
										<h4 class="text">travel with us</h4>
										<div class="caption-inner">
											<div class="ah-headline">
												<span class="typed-static">Enjoy</span>
												<span class="ah-words-wrapper">
													<b class="is-visible"> Adventure</b>
													<b> Holiday</b>
													<b> Mountain</b>
												</span>
											</div>
										</div>
										<form>
											<p>
												<i class="fa fa-map-marker"></i>
												<input type="text" placeholder="Where To?" />
											</p>
											<p>
												<i class="fa fa-calendar"></i>
												<select class="wide">
													<option>Month</option>
													<option>January</option>
													<option>February</option>
													<option>March</option>
													<option>April</option>
													<option>May</option>
													<option>June</option>
													<option>July</option>
													<option>August</option>
													<option>September</option>
													<option>October</option>
													<option>November</option>
													<option>December</option>
												</select>
											</p>
											<p>
												<i class="fa fa-thumb-tack"></i>
												<select class="wide">
													<option>Tour Type</option>
													<option>Adventure</option>
													<option>Romantic</option>
													<option>Vacation</option>
													<option>Explore</option>
													<option>Trendy</option>
												</select>
											</p>
											<p>
												<button type="submit"><i class="fa fa-map-marker"></i> Find Now</button>
											</p>
										</form>
									</div>
							</div>
						</div>
					</div>
			</div>
		</div>
	</section>
	<!-- Slider Area End -->

	<!-- Popular Tours Area Start -->
	<section class="peulis-popular-tours-area section_70">
		<div class="container">
			<div class="row">
					<div class="col-md-12">
						<div class="site-heading">
							<h2><?php echo $this->lang->line('hotels'); ?></h2>
							<p>Lorem ipsum dolor sit amet, conseetuer adipiscing elit. Aenan comdo igula eget. Aenean massa cum sociis Theme natoque.</p>
						</div>
					</div>
			</div>

			<div class="row">
         	<?php foreach ($hotels as $hotel) : ?>
               <div class="col-lg-4">
                  <div class="single-popular-tour">
                     <div class="popular-tour-image">
                           <img src="<?php echo base_url('uploads/hotels/') . $hotel->filename; ?>" alt="Popular Tours" />
                           <div class="popular-tour-hover">
                              <ul>
                                 <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                 <li><a href="#"><i class="fa fa-heart-o"></i></a></li>
                                 <li><a href="#"><i class="fa fa-share-alt"></i></a></li>
                              </ul>
                           </div>
                     </div>
                     <div class="popular-tour-desc">
                           <div class="tour-desc-top">
                              <h3><a href="<?php echo base_url('home/hotel/') . $hotel->id; ?>"><?php echo $hotel->{'type_'.$lang}; ?></a></h3>
                              <div class="tour_duration">
                                 <p>
                                       <i class="fa fa-hourglass-half"></i>
                                       <?php /*echo $hotel->duration_ge;*/ ?>
                                 </p>
                              </div>
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
                                 <a href="<?php echo base_url('home/hotel/') . $hotel->id; ?>"><i class="fa fa-flag"></i> Book Now</a>
                              </div>
                              <div class="tour-desc-price">
                                 <!-- <p><?php echo $subtour->price; ?></p> -->
                              </div>
                           </div>
                     </div>
                  </div>
               </div>
				<?php endforeach; ?>
			</div>

			<div class="row">
					<div class="col-md-12">
						<div class="site-heading">
							<h2><?php echo $this->lang->line('tours'); ?></h2>
							<p>Lorem ipsum dolor sit amet, conseetuer adipiscing elit. Aenan comdo igula eget. Aenean massa cum sociis Theme natoque.</p>
						</div>
					</div>
			</div>

			<div class="row">
				<?php foreach($tours as $tour) :?>
					<div class="col-lg-4">
						<div class="single-popular-tour">
								<div class="popular-tour-image">
									<img src="<?php echo base_url('uploads/tours/'.$tour->filename);?>" alt="Popular Tours" />
									<div class="popular-tour-hover">
										<ul>
											<li><a href="#"><i class="fa fa-eye"></i></a></li>
											<li><a href="#"><i class="fa fa-heart-o"></i></a></li>
											<li><a href="#"><i class="fa fa-share-alt"></i></a></li>
										</ul>
									</div>
								</div>
								<div class="popular-tour-desc">
									<div class="tour-desc-top">
										<h3><a href="<?php echo base_url('home/subtours/'.$tour->id);?>"><?php echo $tour->tourname_ge; ?></a></h3>
										<div class="tour_duration">
												<p>
													<i class="fa fa-hourglass-half"></i>
													5 days / 6 nights
												</p>
										</div>
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
												<a href="tour-details.html"><i class="fa fa-flag"></i> Book Now</a>
										</div>
										<div class="tour-desc-price">
												<p>$1610.00</p>
										</div>
									</div>
								</div>
						</div>
					</div>
				<?php endforeach;?>
			</div>
		</div>
	</section>
	<!-- Popular Tours Area End -->


<?php $this->load->view('templates/footer'); ?>
