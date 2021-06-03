<?php $data['activeitem'] = 99; ?>
<?php $this->load->view('admin/adminheader', $data); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">ქვეტურის რედაქტირება - <?php echo $tour->tourname_ge; ?></h1>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">

				<a href="<?php echo $_SERVER['PHP_SELF'] . '?week=' . ($week - 1) . '&year=' . $year; ?>">Prev Week</a> | 
				<a href="<?php echo $_SERVER['PHP_SELF'] . '?week=' . ($week + 1) . '&year=' . $year; ?>">Next Week</a>
				<br><br>

				<table class="table table-bordered hoteldetails">
					<thead>
						<tr>
							<th scope="col" style="text-align:left">Rooms</th>
							<?php foreach ($rooms['date'] as $date): ?>
								<th scope="col"><?php echo $date . '<br>' . date('l', strtotime($date));?></th>
							<?php endforeach;?>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($rooms['weekdays'] as $ind=>$wd): ?>
							<tr>
								<th scope="row" style="text-align:left">Room <?php echo $ind+1;?></th>
								<?php foreach ($wd as $w): ?>
									<td scope="col"> <?php echo $w;?></td>
								<?php endforeach;?>
							</tr>					
						<?php endforeach;?>
					</tbody>
				</table>

			</div>
		</div>
	</div>
</main>
<input type="text" class="form-control hotelorder">
<br><br><br><br><br>
<?php $this->load->view('templates/footer'); ?>