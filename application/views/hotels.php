<!-- Popular Tours Area Start -->
<section class="peulis-popular-tours-area section_70">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="site-heading">
               <h2><?php echo lang('hotelRooms');?></h2>
               <?php if(isset($hoteltexts->{'text_'.$this->lang->lang()})):?>
                  <p><?php echo $hoteltexts->{'text_'.$this->lang->lang()};?></p>
               <?php endif;?>
            </div>
         </div>
      </div>
      <div class="row mb-5">
         <?php foreach ($hotels as $hotel) : ?>
            <div class="col-lg-4">
               <div class="single-popular-tour">
                  <div class="popular-tour-image">
                     <img src="<?php echo site_url('uploads/hotels/'.$hotel->filename);?>" alt="Popular Tours" />
                  </div>
                  <div class="popular-tour-desc">
                     <div class="tour-desc-top">
                        <h3>
                           <a href="<?php echo site_url('home/hotel/'.$hotel->id.'/'.strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $hotel->type_en)));?>">
                              <?php echo $hotel->{'type_'.$this->lang->lang()};?>
                           </a>
                        </h3>
                        
                        <div class="tour-desc-heading">
                           <div class="tour-rating">
                              <span class="rating"><?php echo $hotel->averageRate;?></span>
                           </div>
                           <div class="tour-details flex-row-reverse">
                              <a href="<?php echo site_url('home/hotel/'.$hotel->id.'/'.strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $hotel->type_en)));?>" class="btn-block text-center">
                                 <?php echo lang('details');?>
                              </a>
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
<script>
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
<!-- Popular Tours Area End -->