<!-- Popular Tours Area Start -->
<section class="peulis-popular-tours-area section_70">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="site-heading">
               <h2><?php echo lang('autopark');?></h2>
            </div>
         </div>
      </div>
      <div class="row mb-5">			
			<?php foreach ($carImages as $carImage) : ?>
				<div class="col-lg-4 d-flex align-items-center">
					<a href="<?= base_url('uploads/autopark/'.$carImage->filename); ?>" class="single-gallery-tour image-link">
						<img src="<?php echo site_url('uploads/autopark/'.$carImage->filename);?>" class="img-thumbnail" alt="<?php echo lang('autopark');?>" />
					</a>
				</div>
			<?php endforeach; ?>			
      </div>
   </div>
</section>

<!-- Popular Tours Area End -->