<?php $data['activeitem'] = 99; ?>
<?php $this->load->view('admin/adminheader', $data); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">სასტუმროს რედაქტირება - <?php echo $hotel->type_ge; ?></h1>
	</div>

	<div class="container-fluid">
		
		<?php echo form_open(base_url('admin/editHotel/'.$id), array("enctype" => "multipart/form-data")); ?>

		<div class="form-row">
			
			<div class="form-group col-md-3">
				<label>სასტუმროს დასახლება</label>
			</div>
			<div class="form-group col-md-3">
				<input type="text" class="form-control form-control-sm" id="type_ge" name="type_ge" value="<?php echo $hotel->type_ge; ?>" autocomplete="off" placeholder="ქართულად">
				<small style="color:red"><?php echo form_error('type_ge'); ?></small>
			</div>
			<div class="form-group col-md-3">
				<input type="text" class="form-control form-control-sm" id="type_en" name="type_en" value="<?php echo $hotel->type_en; ?>" autocomplete="off" placeholder="ინგლისურად">
				<small style="color:red"><?php echo form_error('type_en'); ?></small>
			</div>
			<div class="form-group col-md-3">
				<input type="text" class="form-control form-control-sm" id="type_ru" name="type_ru" value="<?php echo $hotel->type_ru; ?>" autocomplete="off" placeholder="რუსულად">
				<small style="color:red"><?php echo form_error('type_ru'); ?></small>
			</div>

			<div class="form-group col-md-3">
				<label>აღწერა ქართულად</label>
			</div>
			<div class="form-group col-md-9">
				<textarea type="text" class="form-control form-control-sm summernote" id="hotel_ge" name="hotel_ge" ><?php echo $hotel->hotel_ge; ?></textarea>
				<small style="color:red"><?php echo form_error('hotel_ge'); ?></small>
			</div>

			<div class="form-group col-md-3">
				<label>აღწერა ინგლისურად</label>
			</div>
			<div class="form-group col-md-9">
				<textarea type="text" class="form-control form-control-sm summernote" id="hotel_en" name="hotel_en" ><?php echo $hotel->hotel_en; ?></textarea>
				<small style="color:red"><?php echo form_error('hotel_en'); ?></small>
			</div>

			<div class="form-group col-md-3">
				<label>აღწერა რუსულად</label>
			</div>
			<div class="form-group col-md-9">
				<textarea type="text" class="form-control form-control-sm summernote" id="hotel_ru" name="hotel_ru" ><?php echo $hotel->hotel_ru; ?></textarea>
				<small style="color:red"><?php echo form_error('hotel_ru'); ?></small>
			</div>


			<div class="form-group col-lg-12">
				<button type="button" class="btn btn-success btn-sm" id="addimage">სურათის დამატება</button>
			</div>

			<table class="table table-sm">
				<thead>
					<tr>
						<th scope="col">მთავარი</th>
                  <th scope="col">ფაილი</th>
                  <th scope="col">მოქმედება</th>
					</tr>
				</thead>
				<tbody id="imgcontainer">
               <?php foreach ($hotelimages as $image): ?>
                  <tr>
                     <td><input type="radio" value="old<?php echo $image->id;?>" name="mainImage" <?php echo $image->ismain ? ' checked':'';?>></td>
                     <td><img src="<?php echo base_url('uploads/hotels/'.$image->filename);?>" style="height:36px; margin-right:10px"><?php echo $image->filename;?></td>
                     <td><a href="<?php echo base_url('admin/deleteHotelImage/'.$image->id.'/'.$hotel->id);?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"> წაშლა</i></a></td>
                  </tr>
               <?php endforeach; ?>
					<tr>
						<td><input type="radio" value="1" name="mainImage"></td>
                  <td><input type="file" name="hotelImages[]"></td>
                  <td></td>
					</tr>
				</tbody>
			</table>
		</div>
      <input type="hidden" name="oldimages" value="<?php echo count($hotelimages);?>">
		<div class="form-group col-lg-7">
			<button type="submit" class="btn btn-primary px-4"><i class="fa fa-save mr-2"></i>შენახვა</button>
		</div>
	</div>
	<?php echo form_close(); ?>

</main>
<script>
   var index = 1;
   $('#hotel_ge, #hotel_en, #hotel_ru').summernote({
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
      $("#imgcontainer").append('<tr><td><input type="radio" name="mainImage" value="' + index + '"></td><td colspan="2"><input type="file" name="tourImages[]"></td></tr>');
   });
</script>
<?php $this->load->view('admin/adminfooter'); ?>