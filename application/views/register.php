

<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="login-box mt-4 mb-5 pb-4 ">
            <h3><?php echo lang('register');?></h3>
            <?php echo form_open(site_url('auth/register_process'));?>

               <div class="form-group">
                  <label for="email">Email<span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                  <small style="color:red"><?php echo form_error('email'); ?></small>
               </div>

               <div class="form-group">
                  <label for="fullname"><?php echo lang('fullName');?></label>
                  <input type="text" class="form-control" id="fullname" name="fullname" placeholder="<?php echo lang('fullName');?>">
                  <small style="color:red"><?php echo form_error('fullname'); ?></small>
               </div>

               <div class="form-group">
                  <label for="password"><?php echo lang('pwd');?><span class="text-danger">*</span></label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="<?php echo lang('pwd');?>">
                  <small style="color:red"><?php echo form_error('password'); ?></small>
               </div>

               <div class="form-group">
                  <label for="cpassword"><?php echo lang('pwd2');?><span class="text-danger">*</span></label>
                  <input type="password" class="form-control" id="cpassword" name="cpassword" placeholder="<?php echo lang('pwd2');?>">
                  <small style="color:red"><?php echo form_error('cpassword'); ?></small>
               </div>

               <div class="book-tour-field mt-4">
                  <button type="submit"><?php echo lang('register');?></button>
               </div>

            <?php echo form_close();?>
		
         </div>
      </div>
   </div>
</div>