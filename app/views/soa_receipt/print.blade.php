<!DOCTYPE html>

<html lang="en">
<meta http-equiv="Content-Type" content="text/html/css; charset=utf-8"/>
	<head>
		<!-- CUSTOM STYLE -->
		<style type="text/css">
			.panel {
				border-style 	: solid;
				border-width 	: 1px;
				border-color 	: #333333;
				margin-bottom	: 0.5rem;
				padding			: 0.5rem;
				background 	 	: white;
				color 			: #333333;
				margin-left		: -0.55rem; 
				margin-right	: -0.55rem;
			}

			.left-large-6 {
				width: 45.4%;
			}

			.right-large-6 {
				width: 50%;
			}

			.text-center {
				text-align: center !important;
				display:inline-block;
			}

			.right { margin-left: 21.895rem; }

			.top-1 { margin-top: -14.46rem; }

			.sub-top-1 { margin-top: -11.85rem; }

			.sub-top-2 { margin-top: -0.55rem; }

			.parent-top-1 { margin-top: -0.50rem; }

			.separator {
				border-right-style: solid;
				border-color 	 : #333333;
				border-right-width: 1px;
				position: auto;
 			}

			.large-12 {
				width 			: 100%; 
			}

			.size-14 {
				font-size 		: 14px;
			}

			.size-16 {
				font-size 		: 16px;
			}

			body {
			margin: 0;
			padding: 0;
			/*background-color: #f4726d;
			/*background: linear-gradient(to bottom, #ff6935, #4e1400);*/
			background-repeat:no-repeat;
			background-attachment:fixed;
			margin: 0;
			background-size:contain;
			padding: 0;
			height: 100%;
			width: 100%;
			position:relative;
			bottom:0px;
			top:0px;
			line-height: 1.5rem;
			margin-top:0px;
			margin-bottom:0px;
			-webkit-background-size: cover;
			-moz-background-size: cover;
			-o-background-size: cover;
			background-size: cover;
			max-height:100%;
			max-width:100%;
			-webkit-font-smoothing: antialiased;
			font-family:Trebuchet MS, Arial, 'Consolas', sans-serif;
			font-size:1em;
		}
		.right-len-1 { margin-right: -1rem; }

		.left-len-1 { margin-left: -1rem; }

		.sub-top-3  { margin-top: -0.55rem; }

		.sub-top-4  { margin-top: -0.15rem; }

		.sub-top-5  { margin-top: -0.05rem; }

		.sub-top-6 	{ margin-top: -0.55rem; }

		.sub-top-7 	{ margin-top: -9.27rem; }

		.sub-top-8 	{ margin-top: -0.5rem; }

		.sub-top-9 	{ margin-top: -3.15rem; }

		.header-right-1 { 
			margin-right: 1rem; 
			margin-left: 1rem;
		}

		.header-left-1 { margin-left: .9rem; }

		.val-marg-left-1 { margin-left: 5.8rem; }

		.val-marg-left-2 { margin-left: 4.8rem; }

		.sub-len-1 { width: 46.35%; }

		.right-1 {
			margin-left: 20.9rem !important;
		}


		.total-1-mrg-right {
			margin-left: 6rem !important;
		}
	</style>
		
	</head>

	<title>
	</title>

	<body>
		
		<!-- BODY -->

		<?php 
			$total_payment = $p1 + $p2 + $p3 + $p4 + $p5;
			$overall = 0;
			$paymnt = 0;
			$pymnt = 0;
			foreach ($payment_history as $p_hs) {
				$total_payment -= $p_hs->amount;
			}
			$overall = String::formatMoney((double)$total_payment, 'Php');

			foreach ($payment_history as $p_hs) {
				$paymnt += $p_hs->amount;
			}

			$pymnt = String::formatMoney((double)$paymnt, 'Php');
		?>
			
			<div class='panel'>
				<div>
					<label class='text-center'>
					STI COLLEGE MUÑOZ-EDSA <br>
					Tanco-cu Bldg., EDSA, Quezon City <br>
					920-8645 / 927-3967 / 3970 / 3979
					<br> <br> <br>
					STATEMENT OF ACCOUNT <br>
					Updated as of: {{ date('F d, Y', strtotime($p_history->updated_at)) }}
					<br><br>
					</label>
				
					<div class='panel'>
						<label>School Year</label> <span>:</span>
						<label>{{$p_history->school_year }}</label>
						<span class='separator'> </span> <label>Term</label>  <span>:</span>
						<label> {{$p_history->sem }} </label>
						<span class='separator'> </span>
						<label>Program</label>
						<span>:</span>
						<label>{{$student_course }}</label>
						<span class='separator'> </span>
						<label>Student No.</label>
						<span>:</span>
						<label>{{$student->student_no }}</label>
					</div>
					<div class='parent-top-1'>
						<div>
							<div class='panel sub-top-3'>
								<label>Student's Full Name</label> <span>: {{$student->student_name }}</span>
							</div>
						</div>
					</div>
					<div>
						<div class='parent-top-1'>
							<div class='panel sub-top-4'>
								<label>Our records show that you have a total balance of <span style="color: red;">( {{ $overall }} ) </span> of which the amount <span style="color: red;">( {{ $pymnt }} )</span> is due on (). Please resent this to the cashier to facilitate payment. If you fail to remit payment on due date, please see the administrator/COO. However, If payment has been made, please disregard this notice and accept our thanks.</label>
							</div>
						</div>
					</div>

					<!--  -->

					<div>
						<div class='parent-top-1'>
							<div class='right-len-1'>
								<div class='panel left-large-6 sub-top-5'>
									<label class='text-center'>Assessment</label>
								</div>

								<div>
									<div class='panel left-large-6 sub-top-2'>
										<label class='header-right-1'>Particular</label>
										<span class='separator'> </span>
										<label class='header-right-1'>Date</label>
										<span class='separator'> </span>
										<label class='header-right-1'>Amt. Due</label>
									</div>
								</div>

								<div>
									<div class='panel left-large-6 sub-top-6'>
										<label>Downpayment</label>
										<span class='separator'> </span>
										<span>
											<label >{{$p_d1}}</label>
										</span>
										<span class='separator'> </span>
										<span>
											<label >{{String::formatMoney((double)$p1, 'Php')}}</label>
										</span>
										<br>
											<label>2nd payment&nbsp; </label>
											<span class='separator'> </span>
										<span>
											<label >{{$p_d2}}</label>
										</span>
										<span class='separator'> </span>
										<span>
											<label >{{String::formatMoney((double)$p2, 'Php')}}</label>
										</span>
										<br>
											<label>3rd payment &nbsp; </label>
											<span class='separator'> </span>
										<span>
											<label >{{$p_d3}}</label>
										</span>
										<span class='separator'> </span>
										<span>
											<label >{{String::formatMoney((double)$p3, 'Php')}}</label>
										</span>
										<br>
											<label>4th payment &nbsp; </label>
											<span class='separator'> </span>
										<span>
											<label >{{$p_d4}}</label>
										</span>
										<span class='separator'> </span>
										<span>
											<label >{{String::formatMoney((double)$p4, 'Php')}}</label>
										</span>
										<br>
											<label>5th payment &nbsp; </label>
											<span class='separator'> </span>
										<span>
											<label >{{$p_d5}}</label>
										</span>
										<span class='separator'> </span>
										<span>
											<label >{{String::formatMoney((double)$p5, 'Php')}}</label>
										</span>
										<br>
									</div>
								</div>
							</div>

							<span>
								<div class='left-len-1'>
									<div class='panel right-large-6 right top-1'>
										<label class='text-center'>Payment History</label>
									</div>

									<div >
										<div class='panel right sub-top-1'>
											<label class='header-left-1'>&nbsp; OR/CM# &nbsp; </label>
											<span class='separator'> </span>
											<label  class='header-left-1'>&nbsp; Date &nbsp; </label>
											<span class='separator'> </span>
											<label class='header-left-1'>&nbsp; Amt. Paid &nbsp;</label>
										</div>
									</div>
									<div>
										<div class='panel right right-large-6 sub-top-7'>
											@foreach ($payment_history as $p_hs)
											<label>{{$p_hs->or_no}}</label>
											<span class='separator'> </span>
											<label>{{date('F/d/Y', strtotime($p_hs->date_of_payment))}}</label>
											<span class='separator'> </span>
											<label>{{String::formatMoney((double)$p_hs->amount, 'Php')}}</label> <br>
											@endforeach
										</div>
									</div>
								</div>
							</span>
						</div>
					</div>

					<div>
						<div class='panel sub-len-1 sub-top-8'>
							<label>
								Total of (Php):
								<span >
									<label class='total-1-mrg-right'>
										{{String::formatMoney((double)$total_payment, 'Php') }}
									</label>
								</span>
							</label>
						</div>
						<div>
							<div class='panel right-1 sub-top-9'>
								<label>
									Total (Php):
									<span >
										<label class='total-1-mrg-right'>
											{{ $overall }}
										</label>
									</span>
								</label>
							</div>
						</div>

					</div>

				</div>
			</div>
	</body>
</html>