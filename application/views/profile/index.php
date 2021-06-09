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
         <div class="col-lg-3 mb-4 profile-sidebar">
            <div class="container">
               <div class="row bg-white">
                  <div class="img-container col-md-6 col-lg-12">
                     <img src="<?php echo base_url('/uploads/users/'.(isset($userData->avatar)?$userData->avatar:'blankAvatar.jpg'));?>">
                  </div>
                  <ul class="col-md-6 col-lg-12 px-lg-0">
                     <li class="active"><?php echo lang('profile');?></li>
                     <li><a href="<?php echo site_url('profile/orders');?>"><?php echo lang('orders');?></a></li>
                     <li><a href="<?php echo site_url('auth/logout');?>"><?php echo lang('logout');?></a></li>
                  </ul>                
               </div>
            </div>
         </div>
         <div class="col-lg-9 login-box w-100">
         <?php echo form_open_multipart(site_url('profile/profile_process'), array('class'=>'mb-4 mt-3'));?>
            <div class="form-row">
               <div class="form-group col-md-6">
               <label for="fullname"><?php echo lang('fullName');?></label>
               <input type="text" class="form-control" id="fullname" name="fullname" autocomplete="off" value="<?php echo isset($userData->fullname)?$userData->fullname:'';?>">
               <small class="text-danger"><?php echo form_error('fullname');?></small>
            </div>
            <div class="form-group col-md-6">
               <label for="phone"><?php echo lang('phone');?></label>
               <input type="text" class="form-control" id="phone" name="phone" autocomplete="off" value="<?php echo isset($userData->phone)?$userData->phone:'';?>">
               <small class="text-danger"><?php echo form_error('phone');?></small>
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-12">
               <label for="avatar"><?php echo lang('profileImage');?></label>
               <input type="file" class="form-control" id="avatar" name="avatar" autocomplete="off">
               <small class="text-danger"><?php echo form_error('avatar');?></small>
            </div>
         </div>
         <div class="form-row">
            <button type="submit" class="btn btn-primary shadow-none site-button"><i class="fas fa-save mr-2"></i><?php echo lang('save');?></button>
         </div>
         <?php echo form_close();?>


         <?php echo form_open(site_url('profile/password_process'));?>
            <?php if ($this->session->flashdata('profPwdChng')):?>
               <div class="alert alert-<?php echo $this->session->flashdata('profPwdChng')['status']?'success':'danger';?> alert-dismissible fade show" role="alert">
                  <strong><?php echo $this->session->flashdata('profPwdChng')['message'];?></strong>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
               </div>
            <?php endif; ?>
            <div class="form-group">
               <label for="currpassword"><?php echo lang('currpwd');?></label>
               <input type="password" class="form-control" id="currpassword" name="currpassword">
               <small class="text-danger"><?php echo form_error('currpassword');?></small>
            </div>
            <div class="form-group">
               <label for="password"><?php echo lang('npwd');?></label>
               <input type="password" class="form-control" id="password" name="password">
               <small class="text-danger"><?php echo form_error('password');?></small>
            </div>
            <div class="form-group">
               <label for="cpassword"><?php echo lang('pwd2');?></label>
               <input type="password" class="form-control" id="cpassword" name="cpassword">
               <small class="text-danger"><?php echo form_error('cpassword');?></small>
            </div>
            <button type="submit" class="btn btn-primary shadow-none site-button"><i class="fas fa-save mr-2"></i><?php echo lang('save');?></button>
         <?php echo form_close();?>
         </div>
      </div>
   </div>
</section>