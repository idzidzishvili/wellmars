<?php $data['activeitem'] = 3; ?>
<?php $this->load->view('admin/adminheader', $data); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2"><?= $this->lang->line("addtour"); ?></h1>
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

		<?php echo form_open(base_url('admin/addSubTour'), array("enctype" => "multipart/form-data")); ?>

		<div class="form-row">
			<div class="form-group col-md-3">
				<label for="tourId"><?= $this->lang->line("tourname"); ?></label>				
			</div>
			<div class="form-group col-md-9">
				<select class="form-control form-control-sm" id="tourId" name="tourId">
					<option> </option>
					<?php foreach ($tours as $tour) : ?>
						<option value="<?php echo $tour->id; ?>"><?php echo $tour->tourname_ge; ?></option>
					<?php endforeach; ?>
				</select>
				<small style="color:red"><?php echo form_error('tourId'); ?></small>
			</div>

			<div class="form-group col-md-3">
				<label>ქვეტურის დასახლება</label>
			</div>
			<div class="form-group col-md-3">
				<input type="text" class="form-control form-control-sm" id="subTourName_ge" name="subTourName_ge" value="<?php echo set_value('subTourName_ge'); ?>" autocomplete="off" placeholder="ქართულად">
				<small style="color:red"><?php echo form_error('subTourName_ge'); ?></small>
			</div>
			<div class="form-group col-md-3">
				<input type="text" class="form-control form-control-sm" id="subTourName_en" name="subTourName_en" value="<?php echo set_value('subTourName_en'); ?>" autocomplete="off" placeholder="ინგლისურად">
				<small style="color:red"><?php echo form_error('subTourName_en'); ?></small>
			</div>
			<div class="form-group col-md-3">
				<input type="text" class="form-control form-control-sm" id="subTourName_ru" name="subTourName_ru" value="<?php echo set_value('subTourName_ru'); ?>" autocomplete="off" placeholder="რუსულად">
				<small style="color:red"><?php echo form_error('subTourName_ru'); ?></small>
			</div>

			<div class="form-group col-md-3">
				<label>ტურის ხანგძლივობა</label>
			</div>
			<div class="form-group col-md-3">
				<input type="text" class="form-control form-control-sm" id="subTourDuration_ge" name="subTourDuration_ge" value="<?php echo set_value('subTourDuration_ge'); ?>" autocomplete="off" placeholder="ქართულად">
				<small style="color:red"><?php echo form_error('subTourDuration_ge'); ?></small>
			</div>
			<div class="form-group col-md-3">
				<input type="text" class="form-control form-control-sm" id="subTourDuration_en" name="subTourDuration_en" value="<?php echo set_value('subTourDuration_en'); ?>" autocomplete="off" placeholder="ინგლისურად">
				<small style="color:red"><?php echo form_error('subTourDuration_en'); ?></small>
			</div>
			<div class="form-group col-md-3">
				<input type="text" class="form-control form-control-sm" id="subTourDuration_ru" name="subTourDuration_ru" value="<?php echo set_value('subTourDuration_ru'); ?>" autocomplete="off" placeholder="რუსულად">
				<small style="color:red"><?php echo form_error('subTourDuration_ru'); ?></small>
			</div>

			<div class="form-group col-md-3">
				<label>ტურის მიმართულება</label>
			</div>
			<div class="form-group col-md-3">
				<input type="text" class="form-control form-control-sm" id="subTourDest_ge" name="subTourDest_ge" value="<?php echo set_value('subTourDest_ge'); ?>" autocomplete="off" placeholder="ქართულად">
				<small style="color:red"><?php echo form_error('subTourDest_ge'); ?></small>
			</div>
			<div class="form-group col-md-3">
				<input type="text" class="form-control form-control-sm" id="subTourDest_en" name="subTourDest_en" value="<?php echo set_value('subTourDest_en'); ?>" autocomplete="off" placeholder="ინგლისურად">
				<small style="color:red"><?php echo form_error('subTourDest_en'); ?></small>
			</div>
			<div class="form-group col-md-3">
				<input type="text" class="form-control form-control-sm" id="subTourDest_ru" name="subTourDest_ru" value="<?php echo set_value('subTourDest_ru'); ?>" autocomplete="off" placeholder="რუსულად">
				<small style="color:red"><?php echo form_error('subTourDest_ru'); ?></small>
			</div>

			<div class="form-group col-md-3">
				<label>ფასი</label>
			</div>
			<div class="form-group col-md-9">
				<input type="text" class="form-control form-control-sm" id="subTouPrice" name="subTouPrice" value="" autocomplete="off" />
				<small style="color:red"><?php echo form_error('subTouPrice'); ?></small>
			</div>

			<div class="form-group col-md-3">
				<label>აღწერა ქართულად</label>
			</div>
			<div class="form-group col-md-9">
				<textarea type="text" class="form-control form-control-sm" id="subTourDescr_ge" name="subTourDescr_ge" value="" autocomplete="off"></textarea>
				<small style="color:red"><?php echo form_error('subTourDescr_ge'); ?></small>
			</div>

			<div class="form-group col-md-3">
				<label>აღწერა ინგლისურად</label>
			</div>
			<div class="form-group col-md-9">
				<textarea type="text" class="form-control form-control-sm" id="subTourDescr_en" name="subTourDescr_en" value="" autocomplete="off"></textarea>
				<small style="color:red"><?php echo form_error('subTourDescr_en'); ?></small>
			</div>

			<div class="form-group col-md-3">
				<label>აღწერა რუსულად</label>
			</div>
			<div class="form-group col-md-9">
				<textarea type="text" class="form-control form-control-sm summernote" id="subTourDescr_ru" name="subTourDescr_ru" value="" autocomplete="off"></textarea>
				<small style="color:red"><?php echo form_error('subTourDescr_ru'); ?></small>
			</div>


			<div class="form-group col-lg-12">
				<button type="button" class="btn btn-success btn-sm" id="addimage">add image</button>
			</div>

			<table class="table table-sm">
				<thead>
					<tr>
						<th scope="col">მთავარი</th>
						<th scope="col">ფაილი</th>
					</tr>
				</thead>
				<tbody id="imgcontainer">
					<tr>
						<td><input type="radio" name="mainImage" value="1" checked></td>
						<td><input type="file" name="tourImages[]"></td>
					</tr>
				</tbody>
			</table>

		</div>

		<div class="form-group col-lg-7">
			<button type="submit" class="btn btn-primary">შენახვა</button>
		</div>
	</div>
	<?php echo form_close(); ?>

</main>
<script>
   var index = 1;
   $('#subTourDescr_ge, #subTourDescr_en, #subTourDescr_ru').summernote({
      height: 150,
      toolbar: [
         ['style', ['bold', 'italic', 'underline', 'clear']],
         ['font', ['strikethrough', 'superscript', 'subscript']],
         ['color', ['color']],
         ['para', ['ul', 'ol', 'paragraph']],
         ['height', ['height']]
      ]
   });
   $('#addimage').on('click', function() {
      index++;
      $("#imgcontainer").append('<tr><td><input type="radio" name="mainImage" value="' + index + '"></td><td><input type="file" name="tourImages[]"></td></tr>');
   });
</script>
<?php $this->load->view('admin/adminfooter'); ?>