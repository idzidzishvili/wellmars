<?php $data['activeitem'] = 11; ?>
<?php $this->load->view('admin/adminheader', $data); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<div class="mt-4">
		<h2>გალერეა</h2>
		<hr>
	</div>

   <div class="mb-3">
		<a href="<?php echo base_url('admin/addgallery');?>" class="btn btn-success btn-sm" id="addimage"><i class="fa fa-plus-square mr-2"></i>გალერიის დამატება</a>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">გალერიის დასახელება</th>
				<th scope="col">მოქმედება</th>
			</tr>
		</thead>
		<tbody>

         <?php foreach($galleries as $i=>$gallery):?>
            <tr class="tour">
               <th scope="row"><?php echo $i+1;?></th>
               <td><?php echo $gallery->galleryname_ge;?></td>
               <td scope="col">
                  <a href="<?php echo base_url('admin/gallery/'.$gallery->id);?>" alt="ნახვა"><i class="fa fa-eye text-primary mr-2"></i></a>
                  <a href="<?php echo base_url('admin/editgallery/'.$gallery->id);?>" alt="რედაქტირება"><i class="fa fa-edit text-primary mr-2"></i></a>
                  <a href="<?php echo base_url('admin/deletegallery/'.$gallery->id);?>" alt="წაშლა"><i class="fa fa-trash text-danger"></i></a>
               </td>
            </tr>			
		   <?php endforeach;?>
		</tbody>
	</table>
</main>

<?php $this->load->view('admin/adminfooter'); ?>