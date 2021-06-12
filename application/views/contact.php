


<!-- Breadcrumb Area Start -->
<section class="peulis-breadcrumb-area">
   <div class="breadcrumb-top">
      <div class="container">
         <div class="col-lg-12">
            <div class="breadcrumb-box">
               <h2><?php echo lang('contactUs');?></h2>
               <ul class="breadcrumb-inn">
                  <li><a href="<?php echo site_url('/');?>"><?php echo lang('home');?></a></li>
                  <i class="fas fa-chevron-right"></i>
                  <li class="active"><?php echo lang('contactUs');?></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</section>
<!-- Breadcrumb Area End -->
   
   
<!-- Contact Area Start -->
<section class="peulis-contact-area section_70 bg-white">
   <div class="container">
      <div class="row">
         <div class="col-lg-7">
            <div class="contact-left">
               <h3><?php echo lang('sendUsMsg');?></h3>
               <form>
                  <div class="row">
                     <div class="col-lg-6">
                        <p>
                           <input type="text" placeholder="<?php echo lang('fullName');?>" />
                        </p>
                     </div>
                     <div class="col-lg-6">
                        <p>
                        <input type="email" placeholder="Email" />
                        </p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                        <p>
                           <input type="text" placeholder="<?php echo lang('subject');?>" />
                        </p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                        <p>
                           <textarea placeholder="<?php echo lang('yourMessage');?>"></textarea>
                        </p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                        <p>
                           <button type="submit"><?php echo lang('sendMessage');?></button>
                        </p>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <div class="col-lg-5">
            <div class="contact-right">
               <h3><?php echo lang('contactDetails');?></h3>
               <div class="contact-info-item">
                  <div class="contact-info-icon">
                     <i class="fa fa-phone"></i>
                  </div>
                  <div class="contact-info-desc">
                     <span><?php echo lang('phoneNumber');?>:</span>
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
                     <span><?php echo lang('address');?>:</span>
                     <ul>
                        <li><?php echo $contacts->{'address_'.$this->lang->lang()};?></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <?php if ($contacts->map_url):?>
            <div class="col-lg-12 mt-5">
               <h3><?php echo lang('findUsOnMap');?>:</h3>
               <iframe src="<?php echo $contacts->map_url;?>" class="align-self-stretch radius-sm" style="border:0; width:100%; min-height:350px;" allowfullscreen=""></iframe>
            </div>
         <?php endif;?>
      </div>
   </div>
</section>
<!-- Contact Area End -->