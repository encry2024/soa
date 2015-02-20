
<div class="row">

	<div class="large-9 columns large-centered" >
		<div class="panel radius bg-white">
			<br><br>
			<label class="text-center label-black size-20">STATEMENT OF ACCOUNT</label>
			<label class="text-center label-black">As of: Today</label>
			<br><br><br>
				<label class="label-black" style="border: 1px solid black;">
					<span style="margin-right: 0.5rem; background-color: #ddd; padding: 1.5px 1.5px 1.5px 1.5px; border-right-style: solid;border-right-width: 1px;">School Year</span><span>{{ $p_history->school_year }}</span>
					<span style="margin-left: 0.5rem; background-color: #ddd; padding: 1.5px 1.5px 1.5px 1.5px; border-right-style: solid; border-right-width: 1px; border-left-style: solid; border-left-width: 1px;">Term</span><span style="margin-left: 0.5rem;">{{ $p_history->sem }}</span>
					<span style="margin-left: 0.5rem; background-color: #ddd; padding: 1.5px 1.5px 1.5px 1.5px; border-right-style: solid; border-right-width: 1px; border-left-style: solid; border-left-width: 1px;">Program</span><span style="margin-left: 0.5rem;">{{ $u_a->course }}</span>
					<span style="margin-left: 0.5rem; background-color: #ddd; padding: 1.5px 1.5px 1.5px 1.5px; border-right-style: solid; border-right-width: 1px; border-left-style: solid; border-left-width: 1px;">Student No.</span><span style="margin-left: 0.5rem;">{{ $p_history->student_no }}</span>
				</label>
				<label class="label-black" style="border: 1px solid black; margin-top: -0.05rem; ">
					<span class="text-center" style="margin-right: 0.5rem; background-color: #ddd; padding: 1.5px 1.5px 1.5px 1.5px; border-right-style: solid;border-right-width: 1px;">Student's Full Name</span><span class="text-center" style="margin-left: 0.5rem;">{{ $u_a->student_name }}</span>
				</label>
				<label class="label-black" style="border: 1px solid black; margin-top: -0.05rem; ">
					<span class="text-center">Our records show that you have a total balance of   of which the amount   is due on   . Please present this to the Cashier to facilitate payment. If you fail to remit payment on due date, please see the administrator/COO. However, if payment has been made, please disregard this notice and accept our thanks.</span>
				</label>
				<div class="row">
					<div class="large-6 columns">
						<label class="label-black text-center" style="margin-right: -0.55rem; background-color: #ddd; padding: 1.5px 1.5px 1.5px 1.5px; border-right-style: solid; border-right-width: 1px; border-left-style: solid; border-left-width: 1px; border-bottom-style: solid; border-bottom-width: 1px;">Assessment</label>
						<table style="width: 102.55%; border-color: black;">
							<thead style=" border-bottom-style: solid; border-bottom-width: 1px; border-bottom-color: black; border-right-style: solid; border-right-width: 1px; border-right-color: black; border-left-color: black; border-left-style: solid; border-left-width: 1px; ">
								<th style=" border-right-style: solid; border-right-width: 1px; ">Particulars</th>
								<th style=" border-right-style: solid; border-right-width: 1px; ">Date</th>
								<th>Amt. Due</th>
							</thead>
							<body>
								<tr>
									<td>DOWNPAYMENT</td>
									<td>{{ Form::text('p_d1', $u_a->payment_date1, ['class'=>'text-center radius', 'placeholder'=>'State the Date', 'id'=>'dp1', 'data-date-minviewmode'=>'months']) }}</td>
									<td></td>
								</tr>
								<tr>
									<td>2ND PAYMENT</td>
									<td>{{ Form::text('p_d2', $u_a->payment_date2, ['class'=>'text-center radius', 'placeholder'=>'State the Date', 'id'=>'dp2', 'data-date-minviewmode'=>'months']) }}</td>
									<td>{{ $u_a->prelim }}</td>
								</tr>
								<tr>
									<td>3RD PAYMENT</td>
									<td>{{ Form::text('p_d3', $u_a->payment_date3, ['class'=>'text-center radius', 'placeholder'=>'State the Date', 'id'=>'dp3', 'data-date-minviewmode'=>'months']) }}</td>
									<td>{{ $u_a->midterm }}</td>
								</tr>
								<tr>
									<td>4TH PAYMENT</td>
									<td>{{ Form::text('p_d4', $u_a->payment_date4, ['class'=>'text-center radius', 'placeholder'=>'State the Date', 'id'=>'dp4', 'data-date-minviewmode'=>'months']) }}</td>
									<td>{{ $u_a->pre_final }}</td>
								</tr>
								<tr>
									<td>5TH PAYMENT</td>
									<td>{{ Form::text('p_d5', $u_a->payment_date5, ['class'=>'text-center radius', 'placeholder'=>'State the Date', 'id'=>'dp5', 'data-date-minviewmode'=>'months']) }}</td>
									<td>{{ $u_a->final }}</td>
								</tr>
							</body>
						</table>
					</div>

				
					<div class="large-6 columns">
						<label class="label-black text-center" style="margin-left: -0.55rem; background-color: #ddd; padding: 1.5px 1.5px 1.5px 1.5px; border-right-style: solid; border-right-width: 1px; border-left-style: solid; border-left-width: 1px; border-bottom-style: solid; border-bottom-width: 1px;">Assessment</label>
						<table style="width: 103.2%; border-color: black; margin-left: -0.51rem;">
							<thead style=" border-bottom-style: solid; border-bottom-width: 1px; border-bottom-color: black; border-right-style: solid; border-right-width: 1px; border-right-color: black; border-left-color: black; border-left-style: solid; border-left-width: 1px; ">
								<th style=" border-right-style: solid; border-right-width: 1px; ">OR/CM #</th>
								<th style=" border-right-style: solid; border-right-width: 1px; ">Date</th>
								<th style=" border-right-style: solid; border-right-width: 1px; ">Amt. Paid</th>
								<th>18, 615.00</th>
							</thead>
							<body>
								<tr>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
								</tr>
							</body>
						</table>
					</div>
					<div class="row">
						<div class="large-6 columns">
						<br><br><br><br><br><br><br>
						<label class="label-black text-center" style=" padding: 1.5px 1.5px 1.5px 1.5px; border-right-style: solid; border-right-width: 1px; border-left-style: solid; border-left-width: 1px; border-bottom-style: solid; border-bottom-width: 1px; margin-top: 10.4rem; margin-right: -0.1rem; margin-left: -21.64rem;">
							<span class="cs-pull-1" style="background-color: #ddd; padding: 2.5px 2.5px 3.7px 2.5px; border-right-style: solid; border-right-width: 1px; border-left-style: solid; border-left-width: 1px;">Total</span>
							<span class="cs-pull-2">{{ $u_a->prelim + $u_a->midterm + $u_a->pre_final + $u_a->final }}</span>
							<span class="push-1-4" style="background-color: #ddd; padding: 2.5px 2.5px 3.7px 2.5px; border-right-style: solid; border-right-width: 1px; border-left-style: solid; border-left-width: 1px;">Total</span>
							<span class="push-1-2">Total</span> <span class="push-1-3">Total</span>
						</label>
						<label class="label-black text-center" style=" padding: 1.5px 1.5px 1.5px 1.5px; border-right-style: solid; border-right-width: 1px; border-left-style: solid; border-left-width: 1px; border-bottom-style: solid; border-bottom-width: 1px; margin-right: -0.10rem; margin-left: -21.65rem;">
							<span class="cs-pull-1-1" style="background-color: #ddd; padding: 2.5px 2.5px 3.7px 2.5px; border-right-style: solid; border-right-width: 1px; border-left-style: solid; border-left-width: 1px;">Validated & Signed by</span>
							<span class="cs-push-1-1">Date</span>
						</label>
					</div>
				</div>
			<br>
		</div>
	</div>
</div>