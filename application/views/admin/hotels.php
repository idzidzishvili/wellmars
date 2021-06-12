<?php $data['activeitem'] = 5; ?>
<?php $this->load->view('admin/adminheader', $data); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<div class="mt-4">
		<h2>სასტუმროები</h2>
		<hr>
	</div>


	<div class="container-fluid p-0">		
		<?php echo form_open(base_url('admin/hoteltext_process')); ?>
         <div class="form-row">         
            <div class="form-group col-12 mb-0">
               <label for="header_ge">სასტუმროს ტექსტი ქართულად</label>
            </div>
            <div class="form-group col-12">
               <input type="text" class="form-control form-control-sm" name="text_ge" value="<?php echo isset($hoteltexts->text_ge)?$hoteltexts->text_ge:''; ?>" autocomplete="off" placeholder="ტექსტი ქართულად">
               <small style="color:red"><?php echo form_error('text_ge'); ?></small>
            </div>           
            <div class="form-group col-12">
               <input type="text" class="form-control form-control-sm" name="text_en" value="<?php echo isset($hoteltexts->text_en)?$hoteltexts->text_en:'';?>" autocomplete="off" placeholder="ტექსტი ინგლისურად">
               <small style="color:red"><?php echo form_error('text_en'); ?></small>
            </div>            
            <div class="form-group col-12">
               <input type="text" class="form-control form-control-sm" name="text_ru" value="<?php echo isset($hoteltexts->text_ru)?$hoteltexts->text_ru:''; ?>" autocomplete="off" placeholder="ტექსტი რუსულად">
               <small style="color:red"><?php echo form_error('text_ru'); ?></small>
            </div>
				<div class="form-group col-lg-7 mb-5">
               <button type="submit" class="btn btn-primary px-4"><i class="fa fa-save mr-2"></i>შენახვა</button>
            </div>
			</div>
      <?php echo form_close(); ?>
   </div>


	<div class="mb-3">
		<a href="<?php echo base_url('admin/addHotel');?>" class="btn btn-success btn-sm" id="addimage"><i class="fa fa-plus-square mr-2"></i>სასტუმროს დამატება</a>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">სასტუმროს დასახელება</th>
				<th scope="col">მოქმედება</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($hotels as $i=>$hotel): ?>
				<tr>
					<th scope="row"><?php echo $i+1;?></th>
					<td><?php echo $hotel->type_ge;?></td>
					<td scope="col">
						<a href="<?php echo base_url('admin/editHotel/'.$hotel->id);?>" alt="რედაქტირება"><i class="fa fa-edit text-primary mr-2"></i></a>
						<a href="<?php echo base_url('admin/deleteHotel/'.$hotel->id);?>" alt="წაშლა"><i class="fa fa-trash text-danger"></i></a>
					</td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
</main>

<?php $this->load->view('admin/adminfooter'); ?>