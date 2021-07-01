<?php $data['activeitem'] = 7; ?>
<?php $this->load->view('admin/adminheader', $data); ?>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
		<h1 class="h2">ჯავშნები</h1>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">

				<a href="<?php echo $_SERVER['PHP_SELF'] . '?week=' . ($week - 1) . '&year=' . $year; ?>"> < წინა კვირა</a> 
				| 
				<input type="text" id="weekPicker1" />
				|
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
											<table class="table table-striped">
												<tbody>
													<tr>
														<td>შეკვეთის პერიოდი</td>
														<td><?php echo $s[2].'.'.$s[1].'.'.$s[0].' - '.$e[2].'.'.$e[1].'.'.$e[0];?></td>
													</tr>
													<tr>
														<td>დამკვეთი</td>
														<td><?php echo $detail->order_name;?></td>
													</tr>
													<tr>
														<td>დამკვეთის Email</td>
														<td><?php echo $detail->order_email;?></td>
													</tr>
													<tr>
														<td>დამკვეთის ტელეფონი</td>
														<td><?php echo $detail->order_phone;?></td>
													</tr>
													<tr>
														<td>რაოდენობა</td>
														<td><?php echo $detail->num_persons;?></td>
													</tr>
												</tbody>
											</table>
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
<script>
/*
  weekpicker.js
  https://www.jqueryscript.net/time-clock/Easy-Week-Picker-Widget-For-jQuery-UI-weekPicker-js.html
*/
var globalTriggeringElement;
	var globalAdditionalFunction = function() { null; };
	var getDateFromISOWeek = function(ywString, separator) {
		try {
			//console.log(ywString);
			var ywArray = ywString.split(separator);
			var y = ywArray[0];
			var w = ywArray[1];
			var simple = new Date(y, 0, 1 + (w - 1) * 7);
			var dow = simple.getDay();
			var ISOweekStart = simple;
			if (dow <= 4)
					ISOweekStart.setDate(simple.getDate() - simple.getDay() + 1);
			else
					ISOweekStart.setDate(simple.getDate() + 8 - simple.getDay());
			return ISOweekStart;
		} catch (err) {
			console.error("Cannot convert Week into date");
			return new Date();
		}
	};
	var showWeekCalendar = function(triggeringElement, additionalFunction) {
		globalTriggeringElement = triggeringElement;
		globalAdditionalFunction = additionalFunction;
		var prevItem = $(triggeringElement).prev();
		var weekValue = prevItem.val();
		prevItem.datepicker("option", "defaultDate", getDateFromISOWeek(weekValue, '-'));
		prevItem.val(weekValue);
		prevItem.datepicker("show");
	};
	var setWeekCalendar = function(settingElement) {
		var startDate;
		var endDate;
		var selectCurrentWeek = function() {
			window.setTimeout(function() {
					var activeElement = $("#ui-datepicker-div .ui-state-active");
					var tdElement = activeElement.parent();
					var trElement = tdElement.parent();
					trElement.find("a").addClass("ui-state-active")
			}, 1);
		};
		$(settingElement).datepicker({
			showOtherMonths: true,
			selectOtherMonths: true,
			showWeek: true,
			firstDay: 1,
			onSelect: function(dateText, inst) {
					var datepickerValue = $(this).datepicker('getDate');
					var dateObj = new Date(datepickerValue.getFullYear(), datepickerValue.getMonth(), datepickerValue.getDate());
					var weekNum = $.datepicker.iso8601Week(dateObj);
					// if (weekNum < 10) {
					// 	weekNum = "0" + weekNum;
					// }
					var ywString = datepickerValue.getFullYear() + '-' + weekNum;
					$(this).val(ywString);
					$(this).prev().html(ywString);
					startDate = new Date(datepickerValue.getFullYear(), datepickerValue.getMonth(), datepickerValue.getDate() - datepickerValue.getDay());
					endDate = new Date(datepickerValue.getFullYear(), datepickerValue.getMonth(), datepickerValue.getDate() - datepickerValue.getDay() + 6);
					selectCurrentWeek();
					$(this).data('datepicker').inline = true;
					globalAdditionalFunction(globalTriggeringElement);
					console.log(ywString);
					window.location.href = "<?php echo base_url().'pageid=';?>" + ywString;
			},
			onClose: function() {
				$(this).data('datepicker').inline = false;					
			},
			beforeShow: function() {
				selectCurrentWeek();
			},
			beforeShowDay: function(datepickerValue) {
				var cssClass = '';
				if (datepickerValue >= startDate && datepickerValue <= endDate)
					cssClass = 'ui-datepicker-current-day';
				selectCurrentWeek();
				return [true, cssClass];					
			},
			onChangeMonthYear: function(year, month, inst) {				
				selectCurrentWeek();
			}
		}).datepicker('widget').addClass('ui-weekpicker');
		$('body').on('mousemove', '.ui-weekpicker .ui-datepicker-calendar tr', function() { $(this).find('td a').addClass('ui-state-hover'); });
		$('body').on('mouseleave', '.ui-weekpicker .ui-datepicker-calendar tr', function() { $(this).find('td a').removeClass('ui-state-hover'); });
		// function for doing something more
	};
	var convertToWeekPicker = function(targetElement) {
		if (targetElement.prop("tagName") == "INPUT" && (targetElement.attr("type") == "text" || targetElement.attr("type") == "hidden")) {
			var week = targetElement.val();
			$('<span class="displayDate" style="display:none">' + week + '</span>').insertBefore(targetElement);
			$('<i class="fa fa-calendar showCalendar" aria-hidden="true" style="cursor:pointer;margin-left: 10px;margin-top: 3px;" onclick="javascript:showWeekCalendar(this)"></i>').insertAfter(targetElement);
			setWeekCalendar(targetElement);        
		} else {
			targetElement.replaceWith("<span>ERROR: please control js console</span>");
			console.error("convertToWeekPicker() - ERROR: The target element is not compatible with this conversion, try to use an <input type=\"text\" /> or an <input type=\"hidden\" />");
		}
	};

	convertToWeekPicker($("#weekPicker1"));
</script>
<?php $this->load->view('admin/adminfooter'); ?>