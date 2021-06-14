<?php $data['activeitem'] = 99; ?>
<?php $this->load->view('admin/adminheader', $data); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">გალერიის რედაქტირება</h1>
	</div>

	<div class="container-fluid">
		<!-- <div class="row">
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
		</div> -->
		<!-- Add category content -->			
      <?php echo form_open(base_url('admin/editgallery/'.$gallery->id)); ?>
         <div class="form-row">
            <div class="form-group col-md-3 mb-0">
               <label for="galleryname_ge">გალერიის დასახელება ქართულად</label>
            </div>
            <div class="form-group col-md-9">
               <input type="text" class="form-control form-control-sm" id="galleryname_ge" name="galleryname_ge" value="<?php echo $gallery->galleryname_ge; ?>" autocomplete="off" >
               <small style="color:red"><?php echo form_error('galleryname_ge'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0">
               <label for="galleryname_en">გალერიის დასახელება ინგლისურად</label>
            </div>
            <div class="form-group col-md-9">
               <input type="text" class="form-control form-control-sm" id="galleryname_en" name="galleryname_en" value="<?php echo $gallery->galleryname_en; ?>" autocomplete="off" >
               <small style="color:red"><?php echo form_error('galleryname_en'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0">
               <label for="galleryname_ru">გალერიის დასახელება რუსულად</label>
            </div>
            <div class="form-group col-md-9">
               <input type="text" class="form-control form-control-sm" id="galleryname_ru" name="galleryname_ru" value="<?php echo $gallery->galleryname_ru; ?>" autocomplete="off" >
               <small style="color:red"><?php echo form_error('galleryname_ru'); ?></small>
            </div>

            <div class="form-group col-lg-7">
               <button type="submit" class="btn btn-primary"><i class="fa fa-save mr-2"></i>გალერიის რედაქტირება</button>
            </div>
         </div>
      <?php echo form_close(); ?>
	</div>
</main>
<?php $this->load->view('admin/adminfooter'); ?>