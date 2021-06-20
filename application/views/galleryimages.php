<!-- Popular Tours Area Start -->
<section class="peulis-popular-tours-area section_70">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="site-heading">
               <h2><?php echo $gallery->{'galleryname_'.$this->lang->lang()};?></h2>
            </div>
         </div>
      </div>
      <div class="row mb-5">
         <?php foreach ($galleryImages as $galleryImage) : ?>
            <a href="<?= base_url('uploads/galleries/'.$galleryImage->filename); ?>" class="col-lg-4 mt-4 image-link">
               <img src="<?= base_url('uploads/galleries/'.$galleryImage->filename); ?>" />
            </a>

            <!-- <div class="col-lg-4 mt-4">
               <img src="<?php echo site_url('uploads/galleries/'.$galleryImage->filename);?>" alt="<?php echo $gallery->{'galleryname_'.$this->lang->lang()};?>" />
            </div> -->
         <?php endforeach; ?>
      </div>
   </div>
</section>
<!-- Popular Tours Area End -->