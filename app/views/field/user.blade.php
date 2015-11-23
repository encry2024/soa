 




@if($user->type == "student")

	@include('student.payments')
	
	<div id="user_info" class="reveal-modal small" data-reveal>
		
		<div class="panel modal-title cus-pan-hd-3 radius">
			<label class="size-18 label-black large-12 label-ln-ht-1">Student Information </label>
		</div>
		
		<br><br>
		{{ Form::open(array('url' => 'update/student/'. $user->id )) }}
		<label>
			Student No#
			{{ Form::text('stud_no', $user->username, ['class'=>'radius', 'readOnly']) }}
		</label>
		<br>
		<label>
			Full Name
			{{ Form::text('stud_name', $user->lastname .', '. $user->firstname, ['class'=>'radius', 'readOnly']) }}
		</label>
		<br>
		<label>
			Phone Number
			{{ Form::text('phnumber', $user->phonenumber, ['class'=>'radius']) }}
		</label>
		<br>
		<label>
			E-mail
			{{ Form::email('email', $user->email, ['class'=>'radius']) }}
		</label>
		<br>
		<div class="custom-separator"></div>
		<br>
		{{ Form::submit('Save Changes', $attributes = array('class' => 'right button radius login-btn large-3 label-white tiny size-14')) }}
		{{ link_to('#', 'Cancel', $attributes = array('class' => 'close-reveal-modal right button radius login-btn large-3 label-white tiny size-14', 'style'=>'position: relative !important; line-height: 1.3;')) }}
		{{ Form::close() }}
@endif

@if($user->type == "cashier")

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
		<div class="large-12 columns" style=" margin-left: 1.5rem; ">
			<br><br>
			<table id="breakdown" class="dtable" style="width: 100%; margin-left: -4;"></table>
			<a class="close-reveal-modal" style=" margin-top: -2.5rem; ">&#215;</a>
		</div>
	</div>
</div>
@endif