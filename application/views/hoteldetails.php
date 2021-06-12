<?php $this->load->view('templates/header'); ?>


<!-- Tour Details Area Start -->
<section class="peulis-tour-details-area section_70 bg-white">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="tour-details-left">
					<div class="tour-details-head">
						<h3><?php echo $hotel->{'type_'.$this->lang->lang()}; ?> </h3>
						<div>
							<span class="rating"><?php echo $hotel->averageRate;?></span>
							<span>(<?php echo $hotel->rateCount;?> Review)</span>
						</div>						
					</div>
					<div class="my-2">
						<?php foreach($images as $image): ?>
							<?php if($image->ismain):?>									
								<img src="<?= base_url('uploads/hotels/'.$image->filename); ?>" style="width:100%"/>
							<?php endif;?>
						<?php endforeach; ?>
					</div>
					<p>
						<?php echo $hotel->{'hotel_'.$this->lang->lang()}; ?>
					</p>
					
					<!-- Image Gallery section -->
					<div class="tour-gallery">
						<h3><?php echo lang('gallery');?></h3>
						<div class="tour-gallery-slider owl-carousel">
							<?php foreach($images as $image): ?>
								<a href="<?= base_url('uploads/hotels/'.$image->filename); ?>" class="single-gallery-tour image-link">
									<img src="<?= base_url('uploads/hotels/'.$image->filename); ?>" />
								</a>
							<?php endforeach; ?>									
						</div>
					</div>
					<!-- End of Image Gallery section -->

					<!-- Comments section -->
					<?php if($reviews):?>
						<div class="peulis-comment-list">
							<div class="comment-group-title">
								<h3><?php echo lang('reviews');?></h3>
							</div>						
							<div class="single-comment-item">
								<?php foreach($reviews as $review):?>
									<div class="single-comment-box">
										<div class="main-comment">
											<div class="author-image">
												<?php $avatar = $review->avatar?$review->avatar:"blankAvatar.jpg";?>
												<img src="<?php echo base_url('uploads/users/'.$avatar);?>" alt="author">
											</div>
											<div class="comment-text">
												<div class="comment-info">
													<h4>
														<?php 
															if($review->fullname) echo $review->fullname;
															elseif($review->email) echo strtolower($review->email);
														?>
													</h4>
													<span class="rating"><?php echo $review->rating;?></span>
													<p><?php echo date('d M Y', strtotime($review->date)); ?></p>
												</div>
												<div class="comment-text-inner">
													<p><?php echo $review->review;?></p>
												</div>
											</div>
										</div>
									</div>
								<?php endforeach;?>
							</div>
							<div class="review-pagination"><?php echo $links;?></div>
						</div>
					<?php endif;?>
					<!-- End of Comments section -->

					<!-- Review section -->
					<?php if ($this->session->flashdata('review_received')):?>
						<div class="alert alert-primary" role="alert">
							<h4 class="alert-heading"><?php echo lang('thankYou');?>!</h4>
  							<p><?php echo lang('yourReviewReceived');?></p>
						</div>
					<?php elseif(!$this->session->userdata('logged_in')):?>
						<?php echo lang('loginToReview');?>
					<?php elseif($this->session->userdata('logged_in') && !$userHasReview):?>
						<div class="peulis-leave-comment">
							<h3><?php echo lang('leaveReview');?></h3>
							<?php if($this->session->flashdata('review_error')):?>
								<small style="color:red"><?php echo $this->session->flashdata('review_error'); ?></small>
							<?php endif;?>
							<?php echo form_open('profile/review_process/'.$hoteId);?>
								<div class="row">
									<div class="col-lg-12">
										<div class="comment-field">
											<p><?php echo lang('rating');?> :</p>
											<div class="star-rating">
												<input id="star-5" type="radio" name="rating" value="5">
												<label for="star-5" title="5 stars">
													<i class="active fa fa-star" aria-hidden="true"></i>
												</label>
												<input id="star-4" type="radio" name="rating" value="4">
												<label for="star-4" title="4 stars">
													<i class="active fa fa-star" aria-hidden="true"></i>
												</label>
												<input id="star-3" type="radio" name="rating" value="3">
												<label for="star-3" title="3 stars">
													<i class="active fa fa-star" aria-hidden="true"></i>
												</label>
												<input id="star-2" type="radio" name="rating" value="2">
												<label for="star-2" title="2 stars">
													<i class="active fa fa-star" aria-hidden="true"></i>
												</label>
												<input id="star-1" type="radio" name="rating" value="1">
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
											<textarea class="comment" placeholder="<?php echo lang('comment');?>..." name="review"></textarea>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<div class="comment-field">
											<button type="submit" class="peulis-theme-btn"><?php echo lang('postComment');?></button>
										</div>
									</div>
								</div>
							<?php echo form_close();?>
						</div>
					<?php endif;?>
					<!-- End of Review section -->
				</div>
			</div>

			
			<div class="col-lg-4">
				<div class="sidebar-widget">
					<div class="single-sidebar">
						<div class="quick-contact mt-2">
							<h3><?php echo lang('bookThisTour');?></h3>
							<?php if ($this->session->flashdata('validation_errors')) :?>
								<div class="text-danger" style="font-size:.8rem">
									<?php echo $this->session->flashdata('validation_errors');?>
								</div>
							<?php endif;?>
							<?php if ($this->session->flashdata('reserveResult')):?>
								<div class="alert alert-<?php echo $this->session->flashdata('reserveResult')['status']?'success':'danger';?> alert-dismissible fade show" role="alert">
								<?php echo $this->session->flashdata('reserveResult')['message'];?>
								</div>
							<?php endif; ?>

							<?php echo form_open(site_url('profile/hotel_order_process/'.$hoteId));?>
								<div class="book-tour-field">
									<input type="text" placeholder="<?php echo lang('yourName');?>" name="name" value="<?php echo set_value('name'); ?>">
								</div>
								<div class="book-tour-field">
									<input type="email" name="email" placeholder="Email" value="<?php echo set_value('email'); ?>">
								</div>
								<div class="book-tour-field">
									<input type="text" name="phone" placeholder="<?php echo lang('whatsappViberNumber');?>" value="<?php echo set_value('whatsappViberNumber'); ?>">
								</div>
								<div class="book-tour-field">
									<input id="hotelorder_date" name="hotelorder_date" placeholder="<?php echo lang('orderDate');?>" type="text">
								</div>
								<div class="book-tour-field clearfix">
									<select class="wide" name="numofpersons">
										<option selected disabled><?php echo lang('numberOfPersons');?></option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
									</select>
								</div>								
								<div class="book-tour-field">
									<button type="submit"><?php echo lang('bookNow');?></button>
								</div>
							<?php echo form_close();?>
						</div>
					</div>
					<div class="single-sidebar">
						<h3><?php echo lang('contactInformation');?></h3>
						<ul class="more-info">
							<?php if (isset($contacts->phone)):?>
								<li><span><i class="fa fa-phone"></i> <?php echo lang('phoneNumber');?>:</span><?php echo $contacts->phone;?></li>
							<?php endif;?>
							<?php if (isset($contacts->email)):?>
								<li><span><i class="far fa-envelope"></i> Email:</span><?php echo $contacts->email;?></li>
							<?php endif;?>
							<?php if (isset($contacts->{'address_'.$this->lang->lang()})):?>
								<li><span><i class="fa fa-map-marker"></i> <?php echo lang('address');?>:</span><?php echo $contacts->{'address_'.$this->lang->lang()};?></li>
							<?php endif;?>
						</ul>
					</div>					
				</div>
			</div>
		</div>
	</div>
</section>
<!-- Tour Details Area End -->
<script>
	$('#hotelorder_date').daterangepicker();

	$('.rating').each(function(index, el) {
		var rating = $(el).text();
		$(el).html(getStars(rating));
	});
	function getStars(rating) {
		rating = Math.round(rating * 2) / 2;
		let output = [];
		for (var i = rating; i >= 1; i--)
			output.push('<i class="fas fa-star" style="font-weight:600;"></i>');
		if (i == .5) output.push('<i class="fas fa-star-half-alt" style="font-weight:600"></i>');
		for (let i = (5 - rating); i >= 1; i--)
			output.push('<i class="far fa-star" style="font-weight:500;"></i>');
		return output.join('');
	}
</script>

<?php $this->load->view('templates/footer'); ?>