




@if($user->type == "student")

	@include('student.payments')

@endif

@if($user->type == "Cashier")

<div class="row">
	<div class="large-10 columns large-centered" style="margin-left: 13rem;">
		<br><br>
		Account Type: {{ $user->type }}
		<br><br>
		
		<br>
		<div class="row">
			<div class="large-5 columns" style=" border-right-style: solid; border-right-color: #ddd; border-right-width: 1px; ">
				<label class="size-20 nsi-asset-fnt">-Grant Access-<span style="margin-left: 10rem;"></label>
				<br>
				@if ( count($g_a) == 0)
					@foreach ($d_a as $da)
						{{ Form::checkbox('access_array[]', $da->name, false , ["name"=>"access-".$da->id] ) }} {{ $da->name }} <br>
					@endforeach
				@else
					@foreach ($d_a as $da)
						{{ Form::checkbox('access_array[]', $da, false , ["name"=>"access-".$da->id] ) }} {{ $da->name }} <br>
					@endforeach
				@endif
				<br>
			</div>
			<div class="large-5 columns">
			<label class="size-20 nsi-asset-fnt">-Granted Access-<span style="margin-left: 10rem;"></label>
			<br>
				@foreach ($g_a as $ga)
					<ul><li>{{ Form::label('access_array[]', $ga->access->name, ["name"=>"access-".$ga->access->id] ) }} </li> </ul>
				@endforeach
				<br>
			</div>
		</div>
	</div>
</div>
{{ Form::hidden('user_id', $user->id) }}

@endif


@if ($user->type == "student")
<!-- PAYMENT BREAKDOWN -->
<div id="payment_breakdown" class="reveal-modal medium" data-reveal>
	<div class="panel modal-title cus-pan-hd-3 radius">
		<label class="size-18 label-black large-12 label-ln-ht-1">Payment Breakdown</label>
	</div>
	<div class="row">
		<div class="large-4 columns">
		<br><br>
			{{ Form::label('', "Athletic Fee", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('outstanding_balance', $u_a->athletic_fee , array('class' => 'radius', 'readOnly')) }}

			{{ Form::label('', "ERM", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $u_a->erm , array('class' => 'radius', 'readOnly')) }}

			{{ Form::label('', "Internet Fee", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $u_a->internet_fee , array('class' => 'radius', 'readOnly')) }}

			{{ Form::label('', "NYC", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $u_a->nyc , array('class' => 'radius', 'readOnly')) }}

			{{ Form::label('', "Physics Lab", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $u_a->physics_lab , array('class' => 'radius', 'readOnly')) }}

			{{ Form::label('', "Student Events", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $u_a->student_events , array('class' => 'radius', 'readOnly')) }}
		</div>
		<br><br>
		<div class="large-4 columns">
			{{ Form::label('', "Amadeus", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $u_a->amadeus , array('class' => 'radius', 'readOnly')) }}

			{{ Form::label('', "Consumables", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $u_a->consumables , array('class' => 'radius', 'readOnly')) }}

			{{ Form::label('', "Thesis Fee", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $u_a->thesis_fee , array('class' => 'radius', 'readOnly')) }}

			{{ Form::label('', "ACCTG 1 Set", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $u_a->acctg1_set , array('class' => 'radius', 'readOnly')) }}

			{{ Form::label('', "ACCTG 2 Set", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $u_a->acctg2_set , array('class' => 'radius', 'readOnly')) }}
		</div>
		<div class="large-4 columns">
			{{ Form::label('', "PRELIM", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $u_a->prelim , array('class' => 'radius', 'readOnly')) }}

			{{ Form::label('', "MIDTERM", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $u_a->midterm , array('class' => 'radius', 'readOnly')) }}

			{{ Form::label('', "PRE FINAL", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $u_a->pre_final , array('class' => 'radius', 'readOnly')) }}

			{{ Form::label('', "FINALS", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $u_a->final , array('class' => 'radius', 'readOnly')) }}
		</div>
		<a class="close-reveal-modal">&#215;</a>
	</div>
</div>
@endif