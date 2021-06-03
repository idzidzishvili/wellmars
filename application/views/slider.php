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
