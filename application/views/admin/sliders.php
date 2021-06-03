<?php $data['activeitem'] = 4; ?>
<?php $this->load->view('admin/adminheader', $data); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">სლაიდერი</h1>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
            <?php echo form_open(base_url('admin/sliders/'), array("enctype" => "multipart/form-data")); ?>

               <div class="mb-3">
                  <button type="button" class="btn btn-success btn-sm" id="addimage"><i class="fa fa-plus-square mr-2"></i>სურათის დამატება</button>
               </div>

               <table class="table table-sm">
                  <thead>
                     <tr>
                        <th scope="col">ფაილი</th>
                        <th scope="col">მოქმედება</th>
                     </tr>
                  </thead>
                  <tbody id="imgcontainer">
                     <?php foreach ($slides as $slide): ?>
                        <tr>
                           <td><img src="<?php echo base_url('uploads/slider/'.$slide->filename);?>" style="height:48px; margin-right:10px"><?php echo $slide->filename;?></td>
                           <td><a href="<?php echo base_url('admin/deleteSlider/'.$slide->id);?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"> წაშლა</i></a></td>
                        </tr>
                     <?php endforeach; ?>
                     <tr>
                        <td><input type="file" name="sliderImages[]"></td>
                        <td></td>
                     </tr>
                  </tbody>
               </table>

               <div class="mt-2">
                  <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>დამახსოვრება</button>
               </div>

            <?php echo form_close(); ?>
         </div>
		</div> 
	</div>
</main>
<script>
   var index = 1;
   $('#addimage').on('click', function() {
      index++;
      $("#imgcontainer").append('<tr><td colspan="2"><input type="file" name="sliderImages[]"></td></tr>');
   });
</script>
<?php $this->load->view('admin/adminfooter'); ?>