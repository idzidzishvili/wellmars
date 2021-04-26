<?php $this->load->view('templates/header'); ?>

<div class="container mt-5">
	<div class="row">
		<div class="col-md-4 col-lg-5 col-xl-6 d-flex align-items-center ">
			<img src="<?= base_url(); ?>public/images/logo2.png" class="img-fluid mb-4  mx-auto loginimage">
		</div>
		<div class="col-md-8 col-lg-6 col-xl-5 d-flex align-items-center">
			<div class=" container-fluid">
				<div class="row form-title mb-2">
					<h3><?= $this->lang->line("login"); ?></h3>
				</div>
				<?php echo form_open('auth/login', array('class' => 'login', 'id' => 'login')); ?>
				<div class="form-row">
					<?php if ($this->session->flashdata('loginerror')) : ?>
						<div class="alert alert-danger alert-dismissible fade show w-100" role="alert">
							<?php echo $this->session->flashdata('loginerror'); ?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					<?php endif; ?>
				</div>
				<div class="form-row">
					<div class="form-group col-lg-12">
						<label for="username"><?= $this->lang->line("usr"); ?></label>
						<input type="text" class="form-control" id="username" name="username" placeholder="<?= $this->lang->line("usr"); ?>" autocomplete="off">
						<small style="color:red"><?php echo form_error('username'); ?></small>
					</div>
					<div class="form-group col-lg-12">
						<label for="password"><?= $this->lang->line("pwd"); ?></label>
						<input type="password" class="form-control" id="password" name="password" placeholder="<?= $this->lang->line("pwd"); ?>">
						<small style="color:red"><?php echo form_error('password'); ?></small>
					</div>
					<div class="form-group col-lg-7">
						<button type="submit" class="btn btn-primary"><?= $this->lang->line("login"); ?></button>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('templates/footer'); ?>
