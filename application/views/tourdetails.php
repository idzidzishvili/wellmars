<!-- Tour Details Area Start -->
<section class="peulis-tour-details-area section_70">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="tour-details-left">
					<div class="tour-details-head">
						<h3><?php echo $tourdetails->{'tourname_'.$this->lang->lang()};?></h3>						
					</div>
					<div class="my-3">
						<?php foreach($images as $image): ?>
							<?php if($image->ismain):?>									
								<img src="<?= base_url('uploads/tours/'.$image->filename); ?>" style="width:100%"/>
							<?php endif;?>
						<?php endforeach; ?>
					</div>
					<p>
						<?php echo $tourdetails->{'description_'.$this->lang->lang()}; ?>
					</p>
					<ul class="tour-offer clearfix">
						<li>
							<span><?php echo lang('tourDuration');?></span>
							<?php echo $tourdetails->{'duration_'.$this->lang->lang()}; ?>
						</li>
						<li>
							<span><?php echo lang('tourDestination');?></span>
							<?php echo $tourdetails->{'destination_'.$this->lang->lang()}; ?>
						</li>							
					</ul>
					<div class="tour-gallery">
						<h3><?php echo lang('gallery');?></h3>
						<div class="tour-gallery-slider owl-carousel">
								<?php foreach($images as $image): ?>										
									<a href="<?= base_url('uploads/tours/'.$image->filename); ?>" class="single-gallery-tour image-link">
										<img src="<?= base_url('uploads/tours/'.$image->filename); ?>" />
									</a>								
								<?php endforeach; ?>									
						</div>
					</div>				
				</div>
			</div>
			<div class="col-lg-4">
				<div class="sidebar-widget">
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
//document.getElementsByClassName('.venobox').venobox(); 
</script>
