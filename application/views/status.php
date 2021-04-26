<?php $this->load->view('templates/header'); ?>

<div class="container">
	<div class="row">
		<?php $data['lnactive'] = 1; ?>
		<?php $this->load->view('templates/userleftnav', $data); ?>

		<div class="col-lg-9">
			<div class="container fluid">

				<div class="row">
					<div class="col-lg-12 page-header">
						<h3><?= $this->lang->line("status"); ?></h3>
					</div>
				</div>

				<div class="row page-content">
					<div class="col-lg-12">

						<?php if ($showTodayNoWork) : ?>
							<div class="alert alert-info mb-4" role="alert">
								<?php echo $this->lang->line("noWorkToday"); ?>
							</div>
						<?php endif; ?>

						<?php if ($showEndJobButton) : ?>
							<div class="alert alert-info mb-4" role="alert">
								<?php echo $this->lang->line("workstarted") . ': ' . date('d.m.Y H:i:s', $lastLogin + $gmtoffset * 60); ?>
							</div>
							<?php echo form_open(base_url('profile/index')); ?>
							<input type="text" name="comment" class="form-control mb-4" placeholder="<?= $this->lang->line("comment"); ?>">
							<!--
							<select class="form-control" style="width: 100%;" id="usedbreak" name="usedbreak">
								<option value="60"><?php /*echo $this->lang->line("usedbreak");*/ ?></option>
								<option value="0"><?php /*echo $this->lang->line("didnotusebreak");*/ ?></option>
							</select>
						-->
							<button type="submit" class="btn btn-danger btn-lg btn-block my-4" name="endwork" value="endwork"><?= $this->lang->line("endwork"); ?></button>
							<?php echo form_close(); ?>
						<?php endif; ?>

						<?php if ($showStartJobButton) : ?>
							<?php echo form_open(base_url('profile/index')); ?>

							<select class="sel2 form-control" style="width: 100%;" id="location" name="location">
								<option> </option>
								<?php foreach ($locations as $location) : ?>
									<option value="<?php echo $location->name; ?>"><?php echo $location->name; ?></option>
								<?php endforeach; ?>
							</select>

							<button type="submit" class="btn btn-success btn-lg btn-block my-4" name="startwork" value="startwork"><?= $this->lang->line("startwork"); ?></button>
							<?php echo form_close(); ?>
						<?php endif; ?>

						<?php if ($showTodayStats) : ?>
							<div class="alert alert-info mb-4" role="alert">
								<?php
								echo $this->lang->line("workstarted") . ': ' . date('d.m.Y H:i:s', $lastLogin + $gmtoffset * 60);
								if (time() >= $lastLogout)
									echo '<br>' . $this->lang->line("workended") . ': ' . date('d.m.Y H:i:s', $lastLogout + $gmtoffset * 60);
								?>
							</div>
						<?php endif; ?>
					</div>
				</div>

			</div>
		</div>
	</div>

</div>
<?php $this->load->view('templates/footer'); ?>
