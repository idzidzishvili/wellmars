<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="login-box mt-4 mb-5 pb-4 ">
			<h3><?php echo lang('login');?></h3>

				<div class="error-box">
					<?php if ($this->session->flashdata('loginResult')):?>
						<div class="alert alert-<?php echo $this->session->flashdata('loginResult')['status']?'success':'danger';?> alert-dismissible fade show" role="alert">
						<strong><?php echo $this->session->flashdata('loginResult')['message'];?></strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif; ?>

					<?php if ($this->session->flashdata('registerResult')):?>
						<div class="alert alert-<?php echo $this->session->flashdata('registerResult')['status']?'success':'danger';?> alert-dismissible fade show" role="alert">
							<strong><?php echo $this->session->flashdata('registerResult')['message'];?></strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif; ?>

					<?php if ($this->session->flashdata('resetResult')):?>
						<div class="alert alert-<?php echo $this->session->flashdata('resetResult')['status']?'success':'danger';?> alert-dismissible fade show" role="alert">
							<strong><?php echo $this->session->flashdata('resetResult')['message'];?></strong>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif; ?>
				</div>

				<?php echo form_open(site_url('auth/login'));?>
				
					<div class="form-group">
						<label for="email">Email</label>
						<input type="text" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">
						<small style="color:red"><?php echo form_error('email'); ?></small>
					</div>

					<div class="form-group">
						<label for="password"><?php echo lang('pwd');?></label>
						<input type="password" class="form-control" id="password" name="password" placeholder="<?php echo lang('pwd');?>">
						<small style="color:red"><?php echo form_error('password'); ?></small>
					</div>

					<div class="book-tour-field mt-4">
						<button type="submit" class="site-button"><?php echo lang('login');?></button>
					</div>
			
				<?php echo form_close();?>
			</div>
		</div>
	</div>
</div>

  
<div class="px-2">
	<div class="login-box mt-4 mb-5">
		
		
	</div>
		
</div>
