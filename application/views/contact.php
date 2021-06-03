


<!-- Breadcrumb Area Start -->
<section class="peulis-breadcrumb-area">
   <div class="breadcrumb-top">
      <div class="container">
         <div class="col-lg-12">
            <div class="breadcrumb-box">
               <h2>Contact Us</h2>
                  <ul class="breadcrumb-inn">
                  <li><a href="index.html">Home</a></li>
                  <li class="active"><a href="#">Contact Us</a></li>
                  </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Breadcrumb Area End -->
   
   
<!-- Contact Area Start -->
<section class="peulis-contact-area section_70">
   <div class="container">
      <div class="row">
         <div class="col-lg-7">
            <div class="contact-left">
               <h3>Send Us a Message</h3>
               <form>
                  <div class="row">
                     <div class="col-lg-6">
                        <p>
                           <input type="text" placeholder="Full Number" />
                        </p>
                     </div>
                     <div class="col-lg-6">
                        <p>
                        <input type="email" placeholder="Email Address" />
                        </p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                        <p>
                           <input type="text" placeholder="Subject" />
                        </p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                        <p>
                           <textarea placeholder="Your Message"></textarea>
                        </p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                        <p>
                           <button type="submit">Send Message</button>
                        </p>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <div class="col-lg-5">
            <div class="contact-right">
               <h3>Contact Details</h3>
               <div class="contact-info-item">
                  <div class="contact-info-icon">
                     <i class="fa fa-home"></i>
                  </div>
                  <div class="contact-info-desc">
                     <span>Phone:</span>
                     <ul>
                        <li><?php echo $contacts->phone;?></li>
                     </ul>
                  </div>
               </div>
               <div class="contact-info-item">
                  <div class="contact-info-icon">
                     <i class="fa fa-envelope"></i>
                  </div>
                  <div class="contact-info-desc">
                     <span>Email:</span>
                     <ul>
                        <li>
                           <?php echo $contacts->email;?>
                        </li>
                     </ul>
                  </div>
               </div>
               <div class="contact-info-item">
                  <div class="contact-info-icon">
                     <i class="fa fa-map-marker"></i>
                  </div>
                  <div class="contact-info-desc">
                     <span>Address:</span>
                     <ul>
                        <li><?php echo $contacts->{'address_'.$this->lang->lang()};?></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <?php if ($contacts->map_url):?>
            <div class="col-lg-12 mt-5">
               <h3>Find us:</h3>
               <iframe src="<?php echo $contacts->map_url;?>" class="align-self-stretch radius-sm" style="border:0; width:100%; min-height:350px;" allowfullscreen=""></iframe>
            </div>
         <?php endif;?>
      </div>
   </div>
</section>
<!-- Contact Area End -->