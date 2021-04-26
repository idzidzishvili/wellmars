<?php $data['activeitem'] = 2; ?>
<?php $this->load->view('admin/adminheader', $data); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">ტურის დამატება</h1>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-7">
				<?php if ($this->session->flashdata('addTourRes')) : ?>
					<div class="w-100 alert alert-<?php echo ($this->session->flashdata('addTourRes')['status']) ? 'success' : 'danger'; ?> alert-dismissible fade show" role="alert">
						<?php echo $this->session->flashdata('addTourRes')['message']; ?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
				<?php endif; ?>
			</div>
		</div>

		<?php echo form_open_multipart(base_url('admin/addTour'), array("enctype" => "multipart/form-data")); ?>
		<div class="form-row">
			<div class="form-group col-lg-4">
				<label for="tourname_ge">ტურის დასახელება ქართულად</label>
				<input type="text" class="form-control" id="tourname_ge" name="tourname_ge" value="" autocomplete="off">
				<small style="color:red"><?php echo form_error('tourname_ge'); ?></small>
			</div>
			<div class="form-group col-lg-4">
				<label for="tourname_en">დასახელება ინგლისურად</label>
				<input type="text" class="form-control" id="tourname_en" name="tourname_en" value="" autocomplete="off">
				<small style="color:red"><?php echo form_error('tourname_en'); ?></small>
			</div>
			<div class="form-group col-lg-4">
				<label for="tourname_ru">დასახელება რუსულად</label>
				<input type="text" class="form-control" id="tourname_ru" name="tourname_ru" value="" autocomplete="off">
				<small style="color:red"><?php echo form_error('tourname_ru'); ?></small>
			</div>
			<div class="form-group col-lg-12">
				<input type="file" class="form-control" id="tourimage" name="tourimage" >
				<small style="color:red"><?php echo form_error('tourimage'); ?></small>
			</div>

			<div class="form-group col-lg-7">
				<button type="submit" class="btn btn-primary">ტურის დამატება</button>
			</div>
		</div>
		<?php echo form_close(); ?>
	</div>
</main>

<?php $this->load->view('admin/adminfooter'); ?>