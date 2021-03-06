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
		<!-- Tab header -->
		<nav> 
			<div class="nav nav-tabs mb-4" id="nav-tab" role="tablist">
				<a class="nav-item nav-link active" id="add-category-tab" data-toggle="tab" href="#add-category" role="tab" aria-controls="add-category" aria-selected="true">კატეგორიის დამატება</a>
				<a class="nav-item nav-link" id="add-tour-tab" data-toggle="tab" href="#add-tour" role="tab" aria-controls="add-tour" aria-selected="false">ტურის დამატება</a>
			</div>
		</nav>
		<!-- Tab content -->
		<div class="tab-content" id="nav-tabContent">
			<div class="tab-pane fade show active" id="add-category" role="tabpanel" aria-labelledby="add-category-tab"> <!-- Add category content -->			
				<?php echo form_open_multipart(base_url('admin/addtourcategory'), array("enctype" => "multipart/form-data")); ?>
					<div class="form-row">
						<div class="form-group col-md-3 mb-0">
							<label for="tourname_ge">კატეგორია ქართულად</label>
						</div>
						<div class="form-group col-md-9">
							<input type="text" class="form-control form-control-sm" id="tourname_ge" name="tourname_ge" value="<?php echo set_value('tourName_ge'); ?>" autocomplete="off" >
							<small style="color:red"><?php echo form_error('tourname_ge'); ?></small>
						</div>
						<div class="form-group col-md-3 mb-0">
							<label for="tourname_en"> კატეგორია ინგლისურად</label>
						</div>
						<div class="form-group col-md-9">
							<input type="text" class="form-control form-control-sm" id="tourname_en" name="tourname_en" value="<?php echo set_value('tourname_en'); ?>" autocomplete="off" >
							<small style="color:red"><?php echo form_error('tourname_en'); ?></small>
						</div>
						<div class="form-group col-md-3 mb-0">
							<label for="tourname_ru"> კატეგორია რუსულად</label>
						</div>
						<div class="form-group col-md-9">
							<input type="text" class="form-control form-control-sm" id="tourname_ru" name="tourname_ru" value="<?php echo set_value('tourname_ru'); ?>" autocomplete="off" >
							<small style="color:red"><?php echo form_error('tourname_ru'); ?></small>
						</div>

						<div class="form-group col-md-3 mb-0">
							<label for="tourname_ru"> კატეგორიის მთავარი სურათი</label>
						</div>
						<div class="form-group col-md-9">
							<input type="file" class="form-control form-control-sm" id="tourimage" name="tourimage" >
							<small style="color:red"><?php echo form_error('tourimage'); ?></small>
						</div>

						<div class="form-group col-lg-7">
							<button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>ტურის დამატება</button>
						</div>
					</div>
				<?php echo form_close(); ?>			
			</div>

			<div class="tab-pane fade" id="add-tour" role="tabpanel" aria-labelledby="add-tour-tab"> <!-- Add tour content -->			
			<?php echo form_open(base_url('admin/addtour_process'), array("enctype" => "multipart/form-data")); ?>
					<div class="form-row">
					<div class="form-group col-md-3">
							<label for="tourId"> კატეგორია </label>				
						</div>
						<div class="form-group col-md-9">
							<select class="form-control form-control-sm" id="tourId" name="tourId">
								<option value="0"> -- კატეგორიის გარეშე (საწყისი გვერდი) --</option>
								<?php foreach ($tourCategories as $tourCat) : ?>
									<option value="<?php echo $tourCat->id; ?>">
										<?php echo $tourCat->tourname_ge;?>
									</option>
								<?php endforeach; ?>
							</select>
							<small style="color:red"><?php echo form_error('tourId'); ?></small>
						</div>
						<div class="form-group col-md-3 mb-0">
							<label>ტურის დასახლება</label>
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
						<div class="form-group col-md-3 mb-0">
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
						<div class="form-group col-md-3 mb-0">
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
						

						<div class="form-group col-md-3 mb-0">
							<label>აღწერა ქართულად</label>
						</div>
						<div class="form-group col-md-9">
							<textarea class="form-control form-control-sm" id="subTourDescr_ge" name="subTourDescr_ge" value="" autocomplete="off"></textarea>
							<small style="color:red"><?php echo form_error('subTourDescr_ge'); ?></small>
						</div>
						<div class="form-group col-md-3 mb-0">
							<label>აღწერა ინგლისურად</label>
						</div>
						<div class="form-group col-md-9">
							<textarea class="form-control form-control-sm" id="subTourDescr_en" name="subTourDescr_en" value="" autocomplete="off"></textarea>
							<small style="color:red"><?php echo form_error('subTourDescr_en'); ?></small>
						</div>
						<div class="form-group col-md-3 mb-0">
							<label>აღწერა რუსულად</label>
						</div>
						<div class="form-group col-md-9">
							<textarea class="form-control form-control-sm" id="subTourDescr_ru" name="subTourDescr_ru" value="" autocomplete="off"></textarea>
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
						<button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>შენახვა</button>
					</div>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
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