<?php $data['activeitem'] = 7; ?>
<?php $this->load->view('admin/adminheader', $data); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">ჯავშნები</h1>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">

				<a href="<?php echo $_SERVER['PHP_SELF'] . '?week=' . ($week - 1) . '&year=' . $year; ?>"> < წინა კვირა</a> | 
				<a href="<?php echo $_SERVER['PHP_SELF'] . '?week=' . ($week + 1) . '&year=' . $year; ?>">შემდეგი კვირა > </a>
				<br><br>
				<?php if(isset($rooms['date'])):?>
					<table class="table table-bordered hoteldetails">
						<thead>
							<tr>
								<th scope="col" style="text-align:left">Rooms</th>
								<?php foreach ($rooms['date'] as $date): ?>
									<?php $d = explode("-", $date); ?>
									<th scope="col"><?php echo $d[2].'.'.$d[1].'.'.$d[0] . '<br>' . date('l', strtotime($date));?></th>
								<?php endforeach;?>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($rooms['weekdays'] as $ind=>$wd): ?>
								<tr>
									<th scope="row" style="text-align:left">Room <?php echo $ind+1;?></th>
									<?php foreach ($wd as $w): ?>
										<td scope="col"> 
											<div 
												<?php if(isset($details[$w])):?>
													data-toggle="modal"
													data-target="#orderModal<?php echo $details[$w]->id;?>"
													style="background-color:<?php echo $details[$w]->color;?>;color:<?php echo $details[$w]->color;?>; 
													cursor:pointer; height:100%; padding-top:14px; padding-bottom:14px"
												<?php endif;?>
											></div>
											<!-- <?php echo $w;?> -->
										</td>
									<?php endforeach;?>
								</tr>					
							<?php endforeach;?>
						</tbody>
					</table>
					<!-- Modal -->
					<?php foreach($details as $detail):?>
						<?php if (isset($detail)):?>
							<div class="modal fade" id="orderModal<?php echo $detail->id;?>" tabindex="-1" role="dialog" aria-labelledby="orderModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="orderModalLabel">შეკვეთის დეტალები</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<?php $s = explode("-", $detail->startdate); $e = explode("-", $detail->enddate); ?>
											შეკვეთის პერიოდი: <?php echo $s[2].'.'.$s[1].'.'.$s[0].' - '.$e[2].'.'.$e[1].'.'.$e[0];?>
										</div>
										<div class="modal-footer py-2">
										<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
										<!-- <button type="button" class="btn btn-primary">Save changes</button> -->
										</div>
									</div>
								</div>
							</div>
						<?php endif;?>
					<?php endforeach;?>
				<?php else:?>
					<?php echo '<h4 class="text-danger"> მოცემული თარიღისთვის მონაცემები არ არის!</h4>';?>
				<?php endif;?>
			</div>
		</div>
	</div>
</main>
<?php $this->load->view('admin/adminfooter'); ?>