<?php

	$total = $p1 + $p2 + $p3 + $p4 + $p5;
	$total_2 = $t_u;
	$payment = 0;
	$ttl_pymt = 0; 
	$ttl = 0;
	$p_his = 0;
	$phis = 0;

	foreach ($p_history as $ph) {
		$payment += $ph->amount;
	}
	$ttl_pymt = String::formatMoney((double)$payment, 'Php');

	foreach ($p_history as $p) {
		$total_2 -= $p->amount;
	}

	$ttl = String::formatMoney((double)$total_2, 'Php');
	foreach ($p_history as $p) {
		$p_his= $p->amount;
	}
	$phis = String::formatMoney((double)$p_his, 'Php');

?>
<div class="row">
	<div class="large-10 columns large-centered" >
		<div class="panel radius bg-white">
			<br><br>
			<label class="text-center label-black size-20">STATEMENT OF ACCOUNT</label>
			<label class="text-center label-black">Updated As of: {{ date('F d, Y', strtotime($p_h->updated_at)) }}</label>
			<br><br><br>
				<label class="label-black" style="border: 1px solid black;">
					<span style="margin-right: 0.5rem; background-color: #ddd; padding: 1.5px 1.5px 1.5px 1.5px; border-right-style: solid;border-right-width: 1px;">School Year</span><span>{{ $p_h->school_year }}</span>
					<span style="margin-left: 0.5rem; background-color: #ddd; padding: 1.5px 1.5px 1.5px 1.5px; border-right-style: solid; border-right-width: 1px; border-left-style: solid; border-left-width: 1px;">Term</span><span style="margin-left: 0.5rem;">{{ $p_h->sem }}</span>
					<span style="margin-left: 0.5rem; background-color: #ddd; padding: 1.5px 1.5px 1.5px 1.5px; border-right-style: solid; border-right-width: 1px; border-left-style: solid; border-left-width: 1px;">Program</span><span style="margin-left: 0.5rem;">{{ $course }}</span>
					<span style="margin-left: 0.5rem; background-color: #ddd; padding: 1.5px 1.5px 1.5px 1.5px; border-right-style: solid; border-right-width: 1px; border-left-style: solid; border-left-width: 1px;">Student No.</span><span style="margin-left: 0.5rem;">{{ $p_h->student_no }}</span>
				</label>
				<label class="label-black" style="border: 1px solid black; margin-top: -0.05rem; ">
					<span class="text-center" style="margin-right: 0.5rem; background-color: #ddd; padding: 1.5px 1.5px 1.5px 1.5px; border-right-style: solid;border-right-width: 1px;">Student's Full Name</span><span class="text-center" style="margin-left: 0.5rem;">{{ $u_a->student_name }}</span>
				</label>
				<label class="label-black" style="border: 1px solid black; margin-top: -0.05rem; ">
					<span class="text-center">Our records show that you have a total balance of <span style="color: red;"> ( {{ $ttl }} ) </span> of which the amount <span style="color:red;"> ( {{ $phis }} )</span>. Please present this to the Cashier to facilitate payment. If you fail to remit payment on due date, please see the Finance office. However, if payment has been made, please disregard this notice and accept our thanks.</span>
				</label>
				<div class="row">
					<div class="large-6 columns">
						<label class="label-black text-center" style="margin-right: -0.55rem; background-color: #ddd; padding: 1.5px 1.5px 1.5px 1.5px; border-right-style: solid; border-right-width: 1px; border-left-style: solid; border-left-width: 1px; border-bottom-style: solid; border-bottom-width: 1px;">Assessment</label>
						<table style="width: 102.5%; border-color: black;">
							<thead style=" border-bottom-style: solid; border-bottom-width: 1px; border-bottom-color: black; border-right-style: solid; border-right-width: 1px; border-right-color: black; border-left-color: black; border-left-style: solid; border-left-width: 1px; ">
								<th style=" border-right-style: solid; border-right-width: 1px; ">Particulars</th>
								<th style=" border-right-style: solid; border-right-width: 1px; ">Date</th>
								<th>Amt. Due</th>
							</thead>
							<body>
								<tr>
									<td>DOWNPAYMENT</td>
									<td>{{ Form::label('p_d1', $p_d1, ['class'=>'text-center']) }}</td>
									<td>{{ String::formatMoney((double)$p1, 'Php') }}</td>
								</tr>
								<tr>
									<td>2ND PAYMENT</td>
									<td>{{ Form::label('p_d2', $p_d2 , ['class'=>'text-center']) }}</td>
									<td>{{ String::formatMoney((double)$p2, 'Php') }}</td>
								</tr>
								<tr>
									<td>3RD PAYMENT</td>
									<td>{{ Form::label('p_d3', $p_d3, ['class'=>'text-center']) }}</td>
									<td>{{ String::formatMoney((double)$p3, 'Php') }}</td>
								</tr>
								<tr>
									<td>4TH PAYMENT</td>
									<td>{{ Form::label('p_d4', $p_d4, ['class'=>'text-center']) }}</td>
									<td>{{ String::formatMoney((double)$p4, 'Php') }}</td>
								</tr>
								<tr>
									<td>5TH PAYMENT</td>
									<td>{{ Form::label('p_d5', $p_d5, ['class'=>'text-center']) }}</td>
									<td>{{ String::formatMoney((double)$p5, 'Php') }}</td>
								</tr>
							</body>
						</table>
					</div>

				
					<div class="large-6 columns">
						<label class="label-black text-center" style="margin-left: -1.39rem; background-color: #ddd; padding: 1.5px 1.5px 1.5px 1.5px; border-right-style: solid; border-right-width: 1px; border-left-style: solid; border-left-width: 1px; border-bottom-style: solid; border-bottom-width: 1px;">Payment History</label>
						<table style="width: 106%; border-color: black; margin-left: -1.4rem;left: auto;">
							<thead style=" border-bottom-style: solid; border-bottom-width: 1px; border-bottom-color: black; border-right-style: solid; border-right-width: 1px; border-right-color: black; border-left-color: black; border-left-style: solid; border-left-width: 1px; ">
								<th style=" border-right-style: solid; border-right-width: 1px; ">OR/CM #</th>
								<th style=" border-right-style: solid; border-right-width: 1px; ">Date</th>
								<th style=" border-right-style: solid; border-right-width: 1px; ">Amt. Paid</th>
							</thead>
							<body>
								@foreach ($p_history as $h)

								<tr>
									<td>{{ $h->or_no }}</td>
									<td> {{ date('F/d/Y', strtotime($h->date_of_payment)) }}</td>
									<td>{{ String::formatMoney((double)$h->amount, 'Php') }}</td>
								</tr>
								@endforeach
							</body>
						</table>
					</div>
					<div class="row">
						<div class="large-6 columns">
						<br><br><br><br><br><br><br>
						<div style=" margin-top: -8.9rem; ">
							<label class="label-black text-center" style=" padding: 1.5px 1.5px 1.5px 1.5px; border-right-style: solid; border-right-width: 1px; border-left-style: solid; border-left-width: 1px; border-bottom-style: solid; border-bottom-width: 1px; margin-top: 7.05rem; margin-right: 0.5rem; margin-left: -24.7rem;">
								<span class="c-st-p-1" style="background-color: #ddd; padding: 2.5px 2.5px 3.7px 2.5px; border-right-style: solid; border-right-width: 1px; border-left-style: solid; border-left-width: 1px;">Total</span>
								<span class="c-st-p-2">{{ String::formatMoney((double)$p1 + $p2 + $p3 + $p4 + $p5, 'Php') }}</span>
								<span class="c-st-ph-1" style="background-color: #ddd; padding: 2.5px 2.5px 3.7px 2.5px; border-right-style: solid; border-right-width: 1px; border-left-style: solid; border-left-width: 1px;">Total</span>
								<span class="push-1-2">{{ $ttl_pymt }} </span> <span class="push-1-3">{{ String::formatMoney((double)$t_u, 'Php'); }}</span>
							</label>
							<label class="label-black text-center" style=" padding: 1.5px 1.5px 1.5px 1.5px; border-right-style: solid; border-right-width: 1px; border-left-style: solid; border-left-width: 1px; border-bottom-style: solid; border-bottom-width: 1px; margin-right: 0.48rem; margin-left: -24.69rem;">
								<span class="c-st-p-3" style="background-color: #ddd; padding: 2.5px 2.5px 3.7px 2.5px; border-right-style: solid; border-right-width: 1px; border-left-style: solid; border-left-width: 1px;">Validated & Signed by</span>
								<span class="cs-push-1-1" style="background-color: #ddd; padding: 2.5px 2.5px 3.7px 2.5px; border-right-style: solid; border-right-width: 1px; border-left-style: solid; border-left-width: 1px;">Date</span> <span class="push-2-edt">{{ date('F/d/Y', strtotime($p_h->date_of_payment)) }}</span>
							</label>
						</div>
					</div>
				</div>
			<br>
		</div>
	</div>
</div>