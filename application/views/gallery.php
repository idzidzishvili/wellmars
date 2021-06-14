<!-- Popular Tours Area Start -->
<section class="peulis-popular-tours-area section_70">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="site-heading">
               <h2><?php echo lang('gallery');?></h2>
            </div>
         </div>
      </div>
      <div class="row mb-5">
         <?php foreach ($galleries as $gallery) : ?>
            <div class="col-lg-4">
               <div class="single-popular-tour">
                  <div class="popular-tour-image">
                     <img src="<?php echo site_url('uploads/galleries/'.$gallery->filename);?>" alt="<?php echo $gallery->{'galleryname_'.$this->lang->lang()};?>" />
                  </div>
                  <div class="popular-tour-desc">
                     <div class="tour-desc-top">
                        <h3 class="text-center w-100 gallery-h3">
                           <a href="<?php echo site_url('home/gallery/'.$gallery->id.'/'.strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $gallery->galleryname_en)));?>">
                              <?php echo $gallery->{'galleryname_'.$this->lang->lang()};?>
                           </a>
                        </h3>
                     </div>
                  </div>
               </div>
            </div>
         <?php endforeach; ?>
      </div>
   </div>
</section>

<!-- Popular Tours Area End -->