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
                     <h4 class="text">
                        <?php echo isset($slidedertexts[0]->{'text_'.$this->lang->lang()})?$slidedertexts[0]->{'text_'.$this->lang->lang()}:'';?>
                     </h4>
                     <div class="caption-inner">
                        <div class="ah-headline">
                           <span class="typed-static">
                              <?php echo isset($slidedertexts[1]->{'text_'.$this->lang->lang()})?$slidedertexts[1]->{'text_'.$this->lang->lang()}:'';?> 
                           </span>
                           <span class="ah-words-wrapper">
                              <?php $changeables = explode(",", $slidedertexts[2]->{'text_'.$this->lang->lang()});?>
                              <?php foreach($changeables as $i=>$c):?>
                                 <b class="<?php echo $i==0?'is-visible':'';?>"> <?php echo $c;?> </b>
                              <?php endforeach;?>
                           </span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Slider Area End -->
