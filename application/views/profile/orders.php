<section class="peulis-popular-tours-area section_70">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
               <div class="site-heading">
                  <h2><?php echo lang('profile');?></h2>
               </div>
         </div>
      </div>
      <div class="row mb-5">
         <div class="col-lg-3 profile-sidebar">
            <div class="container">
               <div class="row bg-white">                  
                  <div class="img-container col-md-6 col-lg-12">
                     <img src="<?php echo base_url('/uploads/users/'.(isset($userdata->avatar)?$userdata->avatar:'blankAvatar.jpg'));?>">
                  </div>
                  <ul class="col-md-6 col-lg-12 px-lg-0">
                     <li><a href="<?php echo site_url('profile/index');?>"><?php echo lang('profile');?></a></li>
                     <li class="active"><?php echo lang('orders');?></li>
                     <li><a href="<?php echo site_url('auth/logout');?>"><?php echo lang('logout');?></a></li>
                  </ul>                
               </div>
            </div>
         </div>
         <div class="col-lg-9 login-box w-100">

         </div>
      </div>
   </div>
</section>