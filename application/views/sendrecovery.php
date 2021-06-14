<section class="peulis-popular-tours-area section_70">
   <div class="container my-4">
      <div class="row">
         <div class="col-lg-12">
            <div class="login-box mt-4 mb-5 pb-4 ">
            <h3><?php echo lang('recoverPassword');?></h3>

               <div class="error-box">
                  <?php if ($this->session->flashdata('sendRecoveryResult')):?>
                     <div class="alert alert-<?php echo $this->session->flashdata('sendRecoveryResult')['status']?'success':'danger';?> alert-dismissible fade show" role="alert">
                        <strong><?php echo $this->session->flashdata('sendRecoveryResult')['message'];?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                  <?php endif; ?>
               </div>

               <?php echo form_open('auth/sendrecovery_process', array('class' => 'tab-pane active', 'id' => 'login')); ?>                       
                  <div class="form-group mb-4">
                     <label class="font-weight-700">E-mail <span class="text-danger">*</span></label>
                     <input name="email" class="form-control" placeholder="Email" type="email" value="<?= set_value('email');?>">
                     <small style="color:red"><?php echo form_error('email'); ?></small>
                  </div>
                  <div class="text-left">
                     <button class="site-button button-lg"><?php echo lang('sendRecovEmail')?></button>
                  </div>
               <?php echo form_close(); ?>               
               
            </div>
         </div>
      </div>
   </div>
</section>