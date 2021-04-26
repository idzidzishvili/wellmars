<?php $data['activeitem'] = 5; ?>
<?php $this->load->view('admin/adminheader', $data); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<div class="mt-4">
		<h2>სასტუმროები</h2>
		<hr>
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