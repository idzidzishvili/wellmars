<?php $data['activeitem'] = 8; ?>
<?php $this->load->view('admin/adminheader', $data); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">კონტაქტი</h1>
	</div>

	<div class="container-fluid">		
		<?php echo form_open(base_url('admin/contact')); ?>
         <div class="form-row">			
            <div class="form-group col-md-3 mb-0">
               <label for="phone">ტელეფონი</label>
            </div>
            <div class="form-group col-md-9">
               <input type="text" class="form-control form-control-sm" id="phone" name="phone" value="<?php echo isset($contacts->phone)?$contacts->phone:''; ?>" autocomplete="off">
               <small style="color:red"><?php echo form_error('phone'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0">
               <label for="email">Email</label>
            </div>
            <div class="form-group col-md-9">
               <input type="text" class="form-control form-control-sm" id="email" name="email" value="<?php echo isset($contacts->email)?$contacts->email:'';?>" autocomplete="off">
               <small style="color:red"><?php echo form_error('email'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0">
               <label for="address_ge">მისამართი ქართულად</label>
            </div>
            <div class="form-group col-md-9">
               <input type="text" class="form-control form-control-sm" id="address_ge" name="address_ge" value="<?php echo isset($contacts->address_ge)?$contacts->address_ge:''; ?>" autocomplete="off">
               <small style="color:red"><?php echo form_error('address'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0">
               <label for="address_en">მისამართი ინგლისურად</label>
            </div>
            <div class="form-group col-md-9">
               <input type="text" class="form-control form-control-sm" id="address_en" name="address_en" value="<?php echo isset($contacts->address_en)?$contacts->address_en:''; ?>" autocomplete="off">
               <small style="color:red"><?php echo form_error('address_en'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0">
               <label for="address_ru">მისამართი რუსულად</label>
            </div>
            <div class="form-group col-md-9">
               <input type="text" class="form-control form-control-sm" id="address_ru" name="address_ru" value="<?php echo isset($contacts->address_ru)?$contacts->address_ru:''; ?>" autocomplete="off">
               <small style="color:red"><?php echo form_error('address_ru'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0">
               <label for="mapurl">რუკის მისამართი</label>
            </div>
            <div class="form-group col-md-9">
               <input type="text" class="form-control form-control-sm" id="map_url" name="map_url" value="<?php echo isset($contacts->map_url)?$contacts->map_url:''; ?>" autocomplete="off">
               <small style="color:red"><?php echo form_error('mapurl'); ?></small>
            </div>

            <div class="form-group col-md-3 mb-0">
               <label for="facebook">Facebook გვერდი</label>
            </div>
            <div class="form-group col-md-9">
               <input type="text" class="form-control form-control-sm" id="facebook" name="facebook" value="<?php echo isset($contacts->facebook)?$contacts->facebook:''; ?>" autocomplete="off">
               <small style="color:red"><?php echo form_error('facebook'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0">
               <label for="twitter">Twitter გვერდი</label>
            </div>
            <div class="form-group col-md-9">
               <input type="text" class="form-control form-control-sm" id="twitter" name="twitter" value="<?php echo isset($contacts->twitter)?$contacts->twitter:''; ?>" autocomplete="off">
               <small style="color:red"><?php echo form_error('twitter'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0">
               <label for="instagram">Instagram გვერდი</label>
            </div>
            <div class="form-group col-md-9">
               <input type="text" class="form-control form-control-sm" id="instagram" name="instagram" value="<?php echo isset($contacts->instagram)?$contacts->instagram:''; ?>" autocomplete="off">
               <small style="color:red"><?php echo form_error('instagram'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0">
               <label for="pinterest">Pinterest გვერდი</label>
            </div>
            <div class="form-group col-md-9">
               <input type="text" class="form-control form-control-sm" id="pinterest" name="pinterest" value="<?php echo isset($contacts->pinterest)?$contacts->pinterest:''; ?>" autocomplete="off">
               <small style="color:red"><?php echo form_error('pinterest'); ?></small>
            </div>

            <div class="form-group col-lg-7">
               <button type="submit" class="btn btn-primary px-4"><i class="fa fa-save mr-2"></i>შენახვა</button>
            </div>
         </div>
      <?php echo form_close(); ?>
   </div>
</main>
<?php $this->load->view('admin/adminfooter'); ?>