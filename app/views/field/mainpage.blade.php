

	@if (Auth::user()->type != "student")
	<div class="row">
		@include('backend.mainpage')
	</div>
	@else
		@include('student.payments')
	@endif


<!-- ADD USER MODAL -->

<div id="add_user" class="reveal-modal small" data-reveal>
{{ Form::open(array('url'=>'tryRegister')) }}
	<div class="panel modal-title cus-pan-hd-3 radius">
		<label class="size-18 label-black large-12 label-ln-ht-1">Create New User</label>
	</div>
	<div class="row">
		<br><br>
		<div class="large-12 columns">
			{{ Form::label('', "Lastname *", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('lastname', '' , array('class' => 'radius', 'placeholder' => 'Enter your Lastname')) }}
		</div>

		<div class="large-12 columns">
			{{ Form::label('', "Firstname *", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('firstname', '' , array('class' => 'radius', 'placeholder' => 'Enter your Firstname')) }}
		</div>

		<div class="large-12 columns">
			{{ Form::label('', "Username *", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('username', '' , array('class' => 'radius', 'placeholder' => 'Enter your Username')) }}
		</div>

		<div class="large-12 columns">
			{{ Form::label('', "Password *", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::password('password', array('class' => 'radius', 'placeholder' => 'Enter your Enter User Password')) }}
		</div>

		<div class="large-12 columns">
			{{ Form::label('', "Confirm Password *", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::password('password_confirmation', array('class' => 'radius', 'placeholder' => 'Enter your Confirm Password')) }}
		</div>

		<div class="large-12 columns">
			{{ Form::label('', "E-mail *", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::email('email', '', ['class'=>'radius']) }}
		</div>

		<div class="large-12 columns">
		<br><br>
			{{ Form::submit('Create User' , $attributes = array('class' => 'size-14 nsi-btn button tiny radius right', 'name' => 'submit')) }}
		</div>
		<a class="close-reveal-modal">&#215;</a>
	</div>
	{{ Form::close() }}
</div>

<!--IMPORT MODAL-->
<div id="import_modal" class="reveal-modal small" data-reveal>
	<div class="panel modal-title cus-pan-hd-3 radius">
		<label class="size-18 label-black large-12 label-ln-ht-1">Import XLS</label>
	</div>
	{{ Form::open(array("url"=>"export/database", 'files' => true)) }}
	<div class="row">
		<div class="large-12 small-12 columns input_fields_wrap">
			<div class="row">
				<div class="large-10 small-12 columns">
				<br><br>
					<label>Filename</label>
					{{ Form::file('file','',array('')) }}
				</div>
			</div>
			
			<br>
			<div class="custom-separator"></div>
			{{ Form::submit('Import File', ["class"=>"button tiny nsi-btn radius size-14 right"]) }}
			<br><br>
			<label class="size-14 label-black"><i>Uploading files may take time depending on the amount items you are importing to.</i></label>
		</div>
		<a class="close-reveal-modal">&#215;</a>
		{{ Form::close() }}
	</div>
</div>


<!--IMPORT MODAL-->
<div id="payment_modal" class="reveal-modal small" data-reveal>
	<div class="panel modal-title cus-pan-hd-3 radius">
		<label class="size-18 label-black large-12 label-ln-ht-1">Import XLS</label>
	</div>
	{{ Form::open(array("url"=>"export/paymenthistory", 'files' => true)) }}
	<div class="row">
		<div class="large-12 small-12 columns input_fields_wrap">
			<div class="row">
				<div class="large-10 small-12 columns">
				<br><br>
					<label>Filename</label>
					{{ Form::file('file','',array('')) }}
				</div>
			</div>
			
			<br>
			<div class="custom-separator"></div>
			{{ Form::submit('Import File', ["class"=>"button tiny nsi-btn radius size-14 right"]) }}
			<br><br>
			<label class="size-14 label-black"><i>Uploading files may take time depending on the amount items you are importing to.</i></label>
		</div>
		<a class="close-reveal-modal">&#215;</a>
		{{ Form::close() }}
	</div>
</div>

@if (Auth::user()->type == "student")

<!-- PAYMENT BREAKDOWN -->
<div id="payment_breakdown" class="reveal-modal medium" data-reveal>
	<div class="panel modal-title cus-pan-hd-3 radius">
		<label class="size-18 label-black large-12 label-ln-ht-1">Payment Breakdown</label>
	</div>
	<div class="row">
		<div class="large-6 columns">
		<br><br>
			{{ Form::label('', "Athletic Fee", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('outstanding_balance', $student_info->athletic_fee , array('class' => 'radius', 'readOnly')) }}

			{{ Form::label('', "ERM", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $student_info->erm , array('class' => 'radius', 'readOnly')) }}

			{{ Form::label('', "Internet Fee", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $student_info->internet_fee , array('class' => 'radius', 'readOnly')) }}

			{{ Form::label('', "NYC", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $student_info->nyc , array('class' => 'radius', 'readOnly')) }}

			{{ Form::label('', "Physics Lab", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $student_info->physics_lab , array('class' => 'radius', 'readOnly')) }}

			{{ Form::label('', "Student Events", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $student_info->student_events , array('class' => 'radius', 'readOnly')) }}
		</div>
		<br><br>
		<div class="large-6 columns">
			{{ Form::label('', "Amadeus", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $student_info->amadeus , array('class' => 'radius', 'readOnly')) }}

			{{ Form::label('', "Consumables", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $student_info->consumables , array('class' => 'radius', 'readOnly')) }}

			{{ Form::label('', "Thesis Fee", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $student_info->thesis_fee , array('class' => 'radius', 'readOnly')) }}

			{{ Form::label('', "ACCTG 1 Set", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $student_info->acctg1_set , array('class' => 'radius', 'readOnly')) }}

			{{ Form::label('', "ACCTG 2 Set", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $student_info->acctg2_set , array('class' => 'radius', 'readOnly')) }}
		</div>
		<a class="close-reveal-modal">&#215;</a>
	</div>
</div>

<div id="persem" class="reveal-modal small" data-reveal>
	<div class="panel modal-title cus-pan-hd-3 radius">
		<label class="size-18 label-black large-12 label-ln-ht-1">Per/Sem Breakdown</label>
	</div>
	<div class="row">
		<div class="large-12 columns">
		<br><br>
		<div class="large-12 columns">
			{{ Form::label('', "PRELIM", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $student_info->prelim , array('class' => 'radius', 'readOnly')) }}

			{{ Form::label('', "MIDTERM", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $student_info->midterm , array('class' => 'radius', 'readOnly')) }}

			{{ Form::label('', "PRE FINAL", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $student_info->pre_final , array('class' => 'radius', 'readOnly')) }}

			{{ Form::label('', "FINALS", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('total', $student_info->final , array('class' => 'radius', 'readOnly')) }}
		</div>
		
	</div>
	<a class="close-reveal-modal">&#215;</a>
</div>
@endif

