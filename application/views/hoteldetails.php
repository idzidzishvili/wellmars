<?php $this->load->view('templates/header'); ?>


<!-- Tour Details Area Start -->
<section class="peulis-tour-details-area section_70">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
					<div class="tour-details-left">
						<div class="tour-details-head">
							<h3><?php echo $hotel->{'type_'.$this->lang->lang()}; ?> </h3>
							<div class="tour-rating">
									<ul>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star"></i></li>
										<li><i class="fa fa-star-o"></i></li>
									</ul>
									<p>(2 Review) </p>
							</div>
						</div>
						<div class="tour-details-image">
							<?php foreach($images as $image): ?>
								<a href="<?= base_url('uploads/hotels/'.$image->filename); ?>" class="image-link">
									<img src="<?= base_url('uploads/hotels/'.$image->filename); ?>" />
								</a>
							<?php endforeach; ?>
						</div>
						<p>
							<?php echo $hotel->{'hotel_'.$this->lang->lang()}; ?>
						</p>
						<ul class="tour-offer clearfix">
							<li><span>Destination </span>Canada</li>
							<li><span>Departure </span>Los Angeles International Airport</li>
							<li><span>Departure Time </span>Sunday 14 of May, 20:30 hs</li>
							<li><span>Accommodation </span>All Inclusive</li>
							<li>
									<span>What´s Included</span>
									<ul>
										<li><i class="fa fa-check-circle"></i> Travel Insurance</li>
										<li><i class="fa fa-check-circle"></i> 5 Star Accommodation</li>
										<li><i class="fa fa-check-circle"></i> Airport Transfer </li>
										<li><i class="fa fa-check-circle"></i> Breakfast</li>
										<li><i class="fa fa-check-circle"></i> Personal Guide </li>
										<li><i class="fa fa-check-circle"></i> Two days long City tour </li>
									</ul>
							</li>
							<li>
									<span>Not Included</span>
									<ul>
										<li><i class="fa fa-times-circle"></i> Gallery Ticket </li>
										<li><i class="fa fa-times-circle"></i> Non-stop flight to Amsterdam</li>
									</ul>
							</li>
						</ul>
						<div class="tour-gallery">
							<h3>Gallery</h3>
							<div class="tour-gallery-slider owl-carousel">
									<div class="single-gallery-tour">
										<img src="<?= base_url(); ?>assets/img/gallery-2.jpg" alt="tour" />
									</div>
									<div class="single-gallery-tour">
										<img src="<?= base_url(); ?>assets/img/gallery-3.jpg" alt="tour" />
									</div>
									<div class="single-gallery-tour">
										<img src="<?= base_url(); ?>assets/img/gallery-4.jpg" alt="tour" />
									</div>
									<div class="single-gallery-tour">
										<img src="<?= base_url(); ?>assets/img/gallery-5.jpg" alt="tour" />
									</div>
									<div class="single-gallery-tour">
										<img src="<?= base_url(); ?>assets/img/gallery.jpg" alt="tour" />
									</div>
							</div>
						</div>
						<div class="peulis-comment-list">
							<div class="comment-group-title">
									<h3>Tour Reviews</h3>
							</div>
							<div class="single-comment-item">
									<div class="single-comment-box">
										<div class="main-comment">
											<div class="author-image">
													<img src="<?= base_url(); ?>assets/img/4.jpg" alt="author">
											</div>
											<div class="comment-text">
													<div class="comment-info">
														<h4>david kamal</h4>
														<ul>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
														</ul>
														<p>4 minitues ago</p>
													</div>
													<div class="comment-text-inner">
														<p>Ne erat velit invidunt his. Eum in dicta veniam interesset, harum lupta definitionem. Vocibus suscipit prodesset vim ei, equidem perpetua eu per.</p>
													</div>
											</div>
										</div>
									</div>
									<div class="single-comment-box">
										<div class="main-comment">
											<div class="author-image">
													<img src="<?= base_url(); ?>assets/img/5.jpg" alt="author">
											</div>
											<div class="comment-text">
													<div class="comment-info">
														<h4>Jerix Ablin</h4>
														<ul>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star"></i></li>
															<li><i class="fa fa-star-o"></i></li>
														</ul>
														<p>12 minitues ago</p>
													</div>
													<div class="comment-text-inner">
														<p>orem ipsum dolor sit amet, consectetur adipisicing elit. Velit omnis animi et iure laudantium vitae, praesentium optio, sapiente distinctio illo? </p>
													</div>
											</div>
										</div>
									</div>
							</div>
						</div>
						<div class="peulis-leave-comment">
							<h3>Leave a Review</h3>
							<form>
									<div class="row">
										<div class="col-lg-12">
											<div class="comment-field">
													<p>Rating :</p>
													<div class="star-rating">
														<input id="star-5" type="radio" name="rating" value="star-5">
														<label for="star-5" title="5 stars">
															<i class="active fa fa-star" aria-hidden="true"></i>
														</label>
														<input id="star-4" type="radio" name="rating" value="star-4">
														<label for="star-4" title="4 stars">
															<i class="active fa fa-star" aria-hidden="true"></i>
														</label>
														<input id="star-3" type="radio" name="rating" value="star-3">
														<label for="star-3" title="3 stars">
															<i class="active fa fa-star" aria-hidden="true"></i>
														</label>
														<input id="star-2" type="radio" name="rating" value="star-2">
														<label for="star-2" title="2 stars">
															<i class="active fa fa-star" aria-hidden="true"></i>
														</label>
														<input id="star-1" type="radio" name="rating" value="star-1">
														<label for="star-1" title="1 star">
															<i class="active fa fa-star" aria-hidden="true"></i>
														</label>
													</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="comment-field">
													<textarea class="comment" placeholder="Comment..." name="comment"></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-6">
											<div class="comment-field">
													<input class="ns-com-name" name="name" placeholder="Name" type="text">
											</div>
										</div>
										<div class="col-lg-6">
											<div class="comment-field">
													<input class="ns-com-name" name="email" placeholder="Email" type="email">
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-lg-12">
											<div class="comment-field">
													<button type="submit" class="peulis-theme-btn">post comment</button>
											</div>
										</div>
									</div>
							</form>
						</div>
					</div>
			</div>
			<div class="col-lg-4">
				<div class="sidebar-widget">
					<div class="single-sidebar">
						<div class="quick-contact">
							<h3>Book This Tour</h3>
							<?php echo form_open(site_url('home/hotel/'.$hotel->id));?>
								<div class="book-tour-field">
									<input type="text" placeholder="Your Name">
								</div>
								<div class="book-tour-field">
									<input type="email" placeholder="Email Address">
								</div>
								<div class="book-tour-field">
									<input type="tel" placeholder="Phone Number">
								</div>
								<div class="book-tour-field">
									<input id="hotelorder_date" name="hotelorder_date" placeholder="Order Date" type="text">
								</div>
								<div class="book-tour-field clearfix">
									<select name="room_number" class="wide">
										<option selected disabled>ოთახის ნომერი</option>
										<?php foreach ($rooms as $room):?>
											<option value="<?php echo $room->id;?>">
												ოთახი N <?php echo $room->id;?>
											</option>
										<?php endforeach;?>
									</select>
								</div>
								<div class="book-tour-field clearfix">
									<select class="wide">
											<option selected disabled>Number Of Person</option>
											<option>1</option>
											<option>2</option>
											<option>3</option>
											<option>4</option>
											<option>5</option>
									</select>
								</div>
								<div class="book-tour-field">
									<button type="submit">Book Now</button>
								</div>
							<?php echo form_close();?>
						</div>
					</div>
					<div class="single-sidebar">
						<h3>More Information</h3>
						<ul class="more-info">
								<li>
									<span><i class="fa fa-phone"></i> Phone Number:</span>
									1-567-124-44227
								</li>
								<li>
									<span><i class="fa fa-clock-o"></i> Office Time:</span>
									9am - 5pm
								</li>
								<li>
									<span><i class="fa fa-map-marker"></i> Office Location:</span>
									5520 Quebec Place
								</li>
						</ul>
					</div>
					<div class="single-sidebar">
						<img src="<?= base_url(); ?>assets/img/destination.jpg" alt="destination" />
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Tour Details Area End -->
<script>
$('#hotelorder_date').daterangepicker();
</script>

<?php $this->load->view('templates/footer'); ?>