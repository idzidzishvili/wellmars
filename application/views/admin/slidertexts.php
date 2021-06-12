<?php $data['activeitem'] = 10; ?>
<?php $this->load->view('admin/adminheader', $data); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">ტექსტი სლაიდერზე</h1>
	</div>

	<div class="container-fluid">		
		<?php echo form_open(base_url('admin/slidertext')); ?>
         <div class="form-row">
         
            <div class="form-group col-md-3 mb-0">
               <label for="header_ge">სათაურის ტექსტი ქართულად</label>
            </div>
            <div class="form-group col-md-9">
               <input type="text" class="form-control form-control-sm" name="header_ge" value="<?php echo isset($slidertexts[0]->text_ge)?$slidertexts[0]->text_ge:''; ?>" autocomplete="off">
               <small style="color:red"><?php echo form_error('header_ge'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0">
               <label for="header_en">სათაურის ტექსტი ინგლისურად</label>
            </div>
            <div class="form-group col-md-9">
               <input type="text" class="form-control form-control-sm" name="header_en" value="<?php echo isset($slidertexts[0]->text_en)?$slidertexts[0]->text_en:'';?>" autocomplete="off">
               <small style="color:red"><?php echo form_error('header_en'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0">
               <label for="header_ru">სათაურის ტექსტი რუსულად</label>
            </div>
            <div class="form-group col-md-9 mb-5">
               <input type="text" class="form-control form-control-sm" name="header_ru" value="<?php echo isset($slidertexts[0]->text_ru)?$slidertexts[0]->text_ru:''; ?>" autocomplete="off">
               <small style="color:red"><?php echo form_error('header_ru'); ?></small>
            </div>

            <div class="form-group col-md-3 mb-0">
               <label for="static_ge">სტატიკური ტექსტი ქართულად</label>
            </div>
            <div class="form-group col-md-9">
               <input type="text" class="form-control form-control-sm" name="static_ge" value="<?php echo isset($slidertexts[1]->text_ge)?$slidertexts[1]->text_ge:''; ?>" autocomplete="off">
               <small style="color:red"><?php echo form_error('static_ge'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0">
               <label for="static_en">სტატიკური ტექსტი ინგლისურად</label>
            </div>
            <div class="form-group col-md-9">
               <input type="text" class="form-control form-control-sm" name="static_en" value="<?php echo isset($slidertexts[1]->text_en)?$slidertexts[1]->text_en:''; ?>" autocomplete="off">
               <small style="color:red"><?php echo form_error('static_en'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0">
               <label for="static_ru">სტატიკური ტექსტი რუსულად</label>
            </div>
            <div class="form-group col-md-9 mb-5">
               <input type="text" class="form-control form-control-sm" name="static_ru" value="<?php echo isset($slidertexts[1]->text_ru)?$slidertexts[1]->text_ru:''; ?>" autocomplete="off">
               <small style="color:red"><?php echo form_error('static_ru'); ?></small>
            </div>           

            <div class="form-group col-md-3 mb-0">
               <label for="changeable_ge">ცვალებადი ტექსტი ქართულად</label>
            </div>
            <div class="form-group col-md-9">
               <input type="text" class="form-control form-control-sm" name="changeable_ge" value="<?php echo isset($slidertexts[2]->text_ge)?$slidertexts[2]->text_ge:''; ?>" autocomplete="off">
               <small style="color:red"><?php echo form_error('changeable_ge'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0">
               <label for="changeable_en">ცვალებადი ტექსტი ინგლისურად</label>
            </div>
            <div class="form-group col-md-9">
               <input type="text" class="form-control form-control-sm" name="changeable_en" value="<?php echo isset($slidertexts[2]->text_en)?$slidertexts[2]->text_en:''; ?>" autocomplete="off">
               <small style="color:red"><?php echo form_error('changeable_en'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0">
               <label for="changeable_ru">ცვალებადი ტექსტი რუსულად</label>
            </div>
            <div class="form-group col-md-9">
               <input type="text" class="form-control form-control-sm" name="changeable_ru" value="<?php echo isset($slidertexts[2]->text_ru)?$slidertexts[2]->text_ru:''; ?>" autocomplete="off">
               <small style="color:red"><?php echo form_error('changeable_ru'); ?></small>
            </div>
            <div class="form-group col-md-9 text-info mb-4">ცვალებადი ტექსტი უნდა გამოიყოს მძიმეებით</div>
           
            <div class="form-group col-lg-7">
               <button type="submit" class="btn btn-primary px-4"><i class="fa fa-save mr-2"></i>შენახვა</button>
            </div>
         </div>
      <?php echo form_close(); ?>
   </div>
</main>
<?php $this->load->view('admin/adminfooter'); ?>