<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="login-box mt-4 mb-5 pb-4 ">
			<h3><?php echo lang('recoverPassword');?></h3>

				<div class="error-box">
               <?php if ($this->session->flashdata('resetResult')):?>
                  <div class="alert alert-<?php echo $this->session->flashdata('resetResult')['status']?'success':'danger';?> alert-dismissible fade show" role="alert">
                     <strong><?php echo $this->session->flashdata('resetResult')['message'];?></strong>
                     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
               <?php endif; ?>
            </div>

            <?php echo form_open('auth/reset_process', array('class' => 'tab-pane active col-12 p-a0', 'id' => 'reset')); ?>                     
               <div class="form-group">
                  <label class="font-weight-700"><?php echo lang('password')?> <span class="text-danger">*</span></label>
                  <input name="password" class="form-control" placeholder="<?php echo lang('password')?>" type="password">
                  <small style="color:red"><?php echo form_error('password'); ?></small>
               </div>
               <div class="form-group">
                  <label class="font-weight-700"><?php echo lang('confPassword')?> <span class="text-danger">*</span></label>
                  <input name="confirmPassword" class="form-control" placeholder="<?php echo lang('confPassword')?>" type="password">
                  <small style="color:red"><?php echo form_error('confirmPassword'); ?></small>
               </div>
               <input type="hidden" name="userid" value="<?php echo $user_id;?>">
               <input type="hidden" name="recstr" value="<?php echo $recstr;?>">
               <div class="text-left">
                  <button class="site-button button-lg"><?php echo lang('resetPassword')?></button>
               </div>
            <?php echo form_close(); ?>

			</div>
		</div>
	</div>
</div>