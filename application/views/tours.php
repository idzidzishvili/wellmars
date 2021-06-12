<!-- Popular Tours Area Start -->
<section class="peulis-popular-tours-area section_70">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="site-heading">
					<h2><?php echo isset($tourdetails)?$tourdetails->{'tourname_'.$this->lang->lang()}:lang('tours');?></h2>
					<?php if(isset($tourtexts->{'text_'.$this->lang->lang()})):?>
						<p><?php echo $tourtexts->{'text_'.$this->lang->lang()};?></p>
					<?php endif;?>
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
								<div class="tour-desc-heading">									
									<div class="tour-details d-flex flex-row-reverse">
										<a href="<?php echo site_url('home/tour/'.$tour->id.'/'.strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $tour->tourname_en)));?>"> <?php echo lang('details');?> </a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<!-- Popular Tours Area End -->