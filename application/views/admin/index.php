<?php $data['activeitem'] = 1; ?>
<?php $this->load->view('admin/adminheader', $data); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<div class="mt-4">
		<h2>ტურები</h2>
		<hr>
	</div>


	<div class="container-fluid p-0">		
		<?php echo form_open(base_url('admin/tourtext_process')); ?>
         <div class="form-row">         
            <div class="form-group col-12 mb-0">
               <label for="header_ge">ტურების ტექსტი</label>
            </div>
            <div class="form-group col-12">
               <input type="text" class="form-control form-control-sm" name="text_ge" value="<?php echo isset($tourtexts->text_ge)?$tourtexts->text_ge:''; ?>" autocomplete="off" placeholder="ტექსტი ქართულად">
               <small style="color:red"><?php echo form_error('text_ge'); ?></small>
            </div>           
            <div class="form-group col-12">
               <input type="text" class="form-control form-control-sm" name="text_en" value="<?php echo isset($tourtexts->text_en)?$tourtexts->text_en:'';?>" autocomplete="off" placeholder="ტექსტი ინგლისურად">
               <small style="color:red"><?php echo form_error('text_en'); ?></small>
            </div>            
            <div class="form-group col-12">
               <input type="text" class="form-control form-control-sm" name="text_ru" value="<?php echo isset($tourtexts->text_ru)?$tourtexts->text_ru:''; ?>" autocomplete="off" placeholder="ტექსტი რუსულად">
               <small style="color:red"><?php echo form_error('text_ru'); ?></small>
            </div>
				<div class="form-group col-lg-7 mb-5">
               <button type="submit" class="btn btn-primary px-4"><i class="fa fa-save mr-2"></i>შენახვა</button>
            </div>
			</div>
      <?php echo form_close(); ?>
   </div>


	<div class="mb-3">
		<a href="<?php echo base_url('admin/addtour');?>" class="btn btn-success btn-sm" id="addimage"><i class="fa fa-plus-square mr-2"></i>ტურის დამატება</a>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">ტურის დასახელება</th>
				<th scope="col">მდებარეობა</th>
				<th scope="col">სახეობა</th>
				<th scope="col">მოქმედება</th>
			</tr>
		</thead>
		<tbody>

			<?php foreach($tourdata['tours'] as $i=>$tour):?>
				<tr class="tour">
					<th scope="row"><?php echo $i+1;?></th>
					<td><?php echo $tour['tourname_ge'];?></td>
					<td><span class="badge badge-secondary">საწყისი გვერდი</span></td>
					<td>
						<?php if(!$tour['istour']):?>
							<a href="<?php echo base_url('home/tour/'.$tour['id']);?>" target="_blank">
								<span class="badge badge-primary">კატეგორია</span>
							</a>
						<?php else:?>
							<a href="<?php echo base_url('home/tour/'.$tour['id']);?>" target="_blank">
								<span class="badge badge-success">ტური</span>
							</a>
						<?php endif;?>
					</td>
					<td scope="col">
						<?php if($tour['istour']):?>
							<a href="<?php echo base_url('admin/editsubtour/'.$tour['id']);?>" alt="რედაქტირება"><i class="fa fa-edit text-primary mr-2"></i></a>
						<?php else:?>
							<a href="<?php echo base_url('admin/edittour/'.$tour['id']);?>" alt="რედაქტირება"><i class="fa fa-edit text-primary mr-2"></i></a>
						<?php endif;?>
						<a href="<?php echo base_url('admin/deletetour/'.$tour['id']);?>" alt="წაშლა"><i class="fa fa-trash text-danger"></i></a>
					</td>
				</tr>
				<?php foreach ($tourdata['subtours'] as $j=>$subtour): ?>
					<?php if ($subtour['tourid'] == $tour['id']): ?>
						<tr>
							<th scope="col"><?php echo $j+1;?></th>
							<td scope="col"><?php echo $subtour['tourname_ge'];?></td>
							<td><span class="badge badge-info">შიდა გვერდი</span></td>
							<td>
								<?php if(!$subtour['istour']):?>
									<a href="<?php echo base_url('home/tour/'.$subtour['id']);?>" target="_blank">
										<span class="badge badge-primary">კატეგორია</span>
									</a>
								<?php else:?>
									<a href="<?php echo base_url('home/tour/'.$subtour['id']);?>" target="_blank">
										<span class="badge badge-success">ტური</span>
									</a>
								<?php endif;?>
							</td>
							<td scope="col">
								<a href="<?php echo base_url('admin/editsubtour/'.$subtour['id']);?>"><i class="fa fa-edit text-primary mr-2"></i></a>
								<a href="<?php echo base_url('admin/deletetour/'.$subtour['id']);?>"><i class="fa fa-trash text-danger"></i></a>
							</td>
						</tr>
					<?php endif;?>
				<?php endforeach; ?>
			<?php endforeach;?>

		</tbody>
	</table>
</main>

<?php $this->load->view('admin/adminfooter'); ?>