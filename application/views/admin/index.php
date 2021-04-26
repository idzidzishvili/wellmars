<?php $data['activeitem'] = 1; ?>
<?php $this->load->view('admin/adminheader', $data); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<div class="mt-4">
		<h2>ტურები</h2>
		<hr>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">ტურის დასახელება</th>
				<th scope="col">მოქმედება</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach($tours as $i=>$tour): ?>
				<tr class="tour">
					<th scope="row"><?php echo $i+1;?></th>
					<td><?php echo $tour['tourname_ge'];?></td>
					<td scope="col">
						<a href="<?php echo base_url('admin/edittour/'.$tour['id']);?>" alt="რედაქტირება"><i class="fa fa-edit text-primary mr-2"></i></a>
						<a href="<?php echo base_url('admin/deletetour/'.$tour['id']);?>" alt="წაშლა"><i class="fa fa-trash text-danger"></i></a>
					</td>
				</tr>
				 	<?php foreach ($tour['subtours'] as $j=>$subtour): ?>
						<tr>
							<th scope="col"><?php echo $j+1;?></th>
							<td scope="col"><?php echo $subtour['tourname_ge'];?></td>
							<td scope="col">
								<a href="<?php echo base_url('admin/editsubtour/'.$subtour['id']);?>"><i class="fa fa-edit text-primary mr-2"></i></a>
								<a href="<?php echo base_url('admin/deletesubtour/'.$subtour['id']);?>"><i class="fa fa-trash text-danger"></i></a>
							</td>
						</tr>
					<?php endforeach; ?>
			<?php endforeach; ?>
		</tbody>
	</table>
</main>

<?php $this->load->view('admin/adminfooter'); ?>