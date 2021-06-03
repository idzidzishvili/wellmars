<?php $data['activeitem'] = 9; ?>
<?php $this->load->view('admin/adminheader', $data); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">ოთახის ტიპები</h1>
	</div>

	<div class="container-fluid">		
		<?php echo form_open(base_url('admin/roomtypes')); ?>
         <div class="form-row">			
            <div class="form-group col-md-3 mb-0"><!-- Room1 -->
               <label for="phone">ოთახი 1</label>
            </div>            
            <div class="form-group col-md-9">
               <select class="form-control form-control-sm" name="room1">
						<option value="0"> ----- </option>
						<?php foreach ($hotelTypes as $hotelType) : ?>
							<option value="<?php echo $hotelType->id; ?>" <?php echo $hotelType->id==$roomTypes[0]->hotel_type?' selected':'';?>>
								<?php echo $hotelType->type_ge;?>
							</option>
						<?php endforeach; ?>
					</select>
					<small style="color:red"><?php echo form_error('room1'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0"><!-- Room2 -->
               <label for="phone">ოთახი 2</label>
            </div>
            <div class="form-group col-md-9">
               <select class="form-control form-control-sm" name="room2">
						<option value="0"> ----- </option>
						<?php foreach ($hotelTypes as $hotelType) : ?>
							<option value="<?php echo $hotelType->id; ?>" <?php echo $hotelType->id==$roomTypes[1]->hotel_type?' selected':'';?>>
								<?php echo $hotelType->type_ge;?>
							</option>
						<?php endforeach; ?>
					</select>
					<small style="color:red"><?php echo form_error('room2'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0"><!-- Room3 -->
               <label for="phone">ოთახი 3</label>
            </div>
            <div class="form-group col-md-9">
               <select class="form-control form-control-sm" name="room3">
						<option value="0"> ----- </option>
						<?php foreach ($hotelTypes as $hotelType) : ?>
							<option value="<?php echo $hotelType->id; ?>" <?php echo $hotelType->id==$roomTypes[2]->hotel_type?' selected':'';?>>
								<?php echo $hotelType->type_ge;?>
							</option>
						<?php endforeach; ?>
					</select>
					<small style="color:red"><?php echo form_error('room3'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0"><!-- Room4 -->
               <label for="phone">ოთახი 4</label>
            </div>
            <div class="form-group col-md-9">
               <select class="form-control form-control-sm" name="room4">
						<option value="0"> ----- </option>
						<?php foreach ($hotelTypes as $hotelType) : ?>
							<option value="<?php echo $hotelType->id; ?>" <?php echo $hotelType->id==$roomTypes[3]->hotel_type?' selected':'';?>>
								<?php echo $hotelType->type_ge;?>
							</option>
						<?php endforeach; ?>
					</select>
					<small style="color:red"><?php echo form_error('room4'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0"><!-- Room5 -->
               <label for="phone">ოთახი 5</label>
            </div>
            <div class="form-group col-md-9">
               <select class="form-control form-control-sm" name="room5">
						<option value="0"> ----- </option>
						<?php foreach ($hotelTypes as $hotelType) : ?>
							<option value="<?php echo $hotelType->id; ?>" <?php echo $hotelType->id==$roomTypes[4]->hotel_type?' selected':'';?>>
								<?php echo $hotelType->type_ge;?>
							</option>
						<?php endforeach; ?>
					</select>
					<small style="color:red"><?php echo form_error('room5'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0"><!-- Room6 -->
               <label for="phone">ოთახი 6</label>
            </div>
            <div class="form-group col-md-9">
               <select class="form-control form-control-sm" name="room6">
						<option value="0"> ----- </option>
						<?php foreach ($hotelTypes as $hotelType) : ?>
							<option value="<?php echo $hotelType->id; ?>" <?php echo $hotelType->id==$roomTypes[5]->hotel_type?' selected':'';?>>
								<?php echo $hotelType->type_ge;?>
							</option>
						<?php endforeach; ?>
					</select>
					<small style="color:red"><?php echo form_error('room6'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0"><!-- Room7 -->
               <label for="phone">ოთახი 7</label>
            </div>
            <div class="form-group col-md-9">
               <select class="form-control form-control-sm" name="room7">
						<option value="0"> ----- </option>
						<?php foreach ($hotelTypes as $hotelType) : ?>
							<option value="<?php echo $hotelType->id; ?>" <?php echo $hotelType->id==$roomTypes[6]->hotel_type?' selected':'';?>>
								<?php echo $hotelType->type_ge;?>
							</option>
						<?php endforeach; ?>
					</select>
					<small style="color:red"><?php echo form_error('room7'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0"><!-- Room8 -->
               <label for="phone">ოთახი 8</label>
            </div>
            <div class="form-group col-md-9">
               <select class="form-control form-control-sm" name="room8">
						<option value="0"> ----- </option>
						<?php foreach ($hotelTypes as $hotelType) : ?>
							<option value="<?php echo $hotelType->id; ?>" <?php echo $hotelType->id==$roomTypes[7]->hotel_type?' selected':'';?>>
								<?php echo $hotelType->type_ge;?>
							</option>
						<?php endforeach; ?>
					</select>
					<small style="color:red"><?php echo form_error('room8'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0"><!-- Room9 -->
               <label for="phone">ოთახი 9</label>
            </div>
            <div class="form-group col-md-9">
               <select class="form-control form-control-sm" name="room9">
						<option value="0"> ----- </option>
						<?php foreach ($hotelTypes as $hotelType) : ?>
							<option value="<?php echo $hotelType->id; ?>" <?php echo $hotelType->id==$roomTypes[8]->hotel_type?' selected':'';?>>
								<?php echo $hotelType->type_ge;?>
							</option>
						<?php endforeach; ?>
					</select>
					<small style="color:red"><?php echo form_error('room9'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0"><!-- Room10 -->
               <label for="phone">ოთახი 10</label>
            </div>
            <div class="form-group col-md-9">
               <select class="form-control form-control-sm" name="room10">
						<option value="0"> ----- </option>
						<?php foreach ($hotelTypes as $hotelType) : ?>
							<option value="<?php echo $hotelType->id; ?>" <?php echo $hotelType->id==$roomTypes[9]->hotel_type?' selected':'';?>>
								<?php echo $hotelType->type_ge;?>
							</option>
						<?php endforeach; ?>
					</select>
					<small style="color:red"><?php echo form_error('room10'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0"><!-- Room11 -->
               <label for="phone">ოთახი 11</label>
            </div>
            <div class="form-group col-md-9">
               <select class="form-control form-control-sm" name="room11">
						<option value="0"> ----- </option>
						<?php foreach ($hotelTypes as $hotelType) : ?>
							<option value="<?php echo $hotelType->id; ?>" <?php echo $hotelType->id==$roomTypes[10]->hotel_type?' selected':'';?>>
								<?php echo $hotelType->type_ge;?>
							</option>
						<?php endforeach; ?>
					</select>
					<small style="color:red"><?php echo form_error('room11'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0"><!-- Room12 -->
               <label for="phone">ოთახი 12</label>
            </div>
            <div class="form-group col-md-9">
               <select class="form-control form-control-sm" name="room12">
						<option value="0"> ----- </option>
						<?php foreach ($hotelTypes as $hotelType) : ?>
							<option value="<?php echo $hotelType->id; ?>" <?php echo $hotelType->id==$roomTypes[11]->hotel_type?' selected':'';?>>
								<?php echo $hotelType->type_ge;?>
							</option>
						<?php endforeach; ?>
					</select>
					<small style="color:red"><?php echo form_error('room12'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0"><!-- Room13 -->
               <label for="phone">ოთახი 13</label>
            </div>
            <div class="form-group col-md-9">
               <select class="form-control form-control-sm" name="room13">
						<option value="0"> ----- </option>
						<?php foreach ($hotelTypes as $hotelType) : ?>
							<option value="<?php echo $hotelType->id; ?>" <?php echo $hotelType->id==$roomTypes[12]->hotel_type?' selected':'';?>>
								<?php echo $hotelType->type_ge;?>
							</option>
						<?php endforeach; ?>
					</select>
					<small style="color:red"><?php echo form_error('room13'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0"><!-- Room14 -->
               <label for="phone">ოთახი 14</label>
            </div>
            <div class="form-group col-md-9">
               <select class="form-control form-control-sm" name="room14">
						<option value="0"> ----- </option>
						<?php foreach ($hotelTypes as $hotelType) : ?>
							<option value="<?php echo $hotelType->id; ?>" <?php echo $hotelType->id==$roomTypes[13]->hotel_type?' selected':'';?>>
								<?php echo $hotelType->type_ge;?>
							</option>
						<?php endforeach; ?>
					</select>
					<small style="color:red"><?php echo form_error('room14'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0"><!-- Room15 -->
               <label for="phone">ოთახი 15</label>
            </div>
            <div class="form-group col-md-9">
               <select class="form-control form-control-sm" name="room15">
						<option value="0"> ----- </option>
						<?php foreach ($hotelTypes as $hotelType) : ?>
							<option value="<?php echo $hotelType->id; ?>" <?php echo $hotelType->id==$roomTypes[14]->hotel_type?' selected':'';?>>
								<?php echo $hotelType->type_ge;?>
							</option>
						<?php endforeach; ?>
					</select>
					<small style="color:red"><?php echo form_error('room15'); ?></small>
            </div>
            <div class="form-group col-md-3 mb-0"><!-- Room16 -->
               <label for="phone">ოთახი 16</label>
            </div>
            <div class="form-group col-md-9">
               <select class="form-control form-control-sm" name="room16">
						<option value="0"> ----- </option>
						<?php foreach ($hotelTypes as $hotelType) : ?>
							<option value="<?php echo $hotelType->id; ?>" <?php echo $hotelType->id==$roomTypes[15]->hotel_type?' selected':'';?>>
								<?php echo $hotelType->type_ge;?>
							</option>
						<?php endforeach; ?>
					</select>
					<small style="color:red"><?php echo form_error('room16'); ?></small>
            </div>
            

            <div class="form-group col-lg-7">
               <button type="submit" class="btn btn-primary px-4"><i class="fa fa-save mr-2"></i>შენახვა</button>
            </div>
         </div>
      <?php echo form_close(); ?>
   </div>
</main>
<?php $this->load->view('admin/adminfooter'); ?>