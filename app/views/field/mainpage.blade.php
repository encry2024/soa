

	@if (Auth::user()->type != "student")

		<br><br><br><br>
		<div class="large-10 small-12 columns large-centered mainpage-container right">
			<div class="row">
				<div class="large-12 small-12 large-centered">
					@if ($notification = Session::get('msg'))
					<br>
						<div data-alert class="alert-box success ">
							<label class="text-center label-white">{{ $notification }}</label>
							<a href="#" class="close">&times;</a>
						</div>
					<br>
					@endif
					@include('backend.mainpage')
				</div>
			</div>
		</div>

	@else
		@include('student.payments')
	@endif

<!-- ADD USER MODAL -->

<div id="due_date" class="reveal-modal small" data-reveal>
{{ Form::open(array('url'=>'update/due_date')) }}
	<div class="panel modal-title cus-pan-hd-3 radius">
		<label class="size-18 label-black large-12 label-ln-ht-1">Update Student's Due Date</label>
	</div>
	<div class="row">
		<br><br>
		<div class="large-12 columns">
			{{ Form::label('', "Down Payment Date *", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('down_payment', $p_d1 , array('class' => 'radius', 'id'=>'dp1', 'placeholder' => "Enter Student's Down Payment")) }}
		</div>

		<div class="large-12 columns">
			{{ Form::label('', "2nd Payment *", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('sec_payment', $p_d2 , array('class' => 'radius', 'id'=>'dp2','placeholder' => "Enter Student's 2nd Payment")) }}
		</div>

		<div class="large-12 columns">
			{{ Form::label('', "3rd Payment *", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('thrd_payment', $p_d3 , array('class' => 'radius', 'id'=>'dp3','placeholder' => "Enter Student's 3rd Payment")) }}
		</div>

		<div class="large-12 columns">
			{{ Form::label('', "4th Payment", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('fth_payment', $p_d4, array('class' => 'radius', 'id'=>'dp4','placeholder' => "Enter Student's 4th Payment")) }}
		</div>

		<div class="large-12 columns">
			{{ Form::label('', "5th Payment *", array('class'=>'size-16 label-black', 'id'=>'Font')) }}
			{{ Form::text('ffth_payment', $p_d5, array('class' => 'radius', 'id'=>'dp5','placeholder' => "Enter Student's 5th Payment")) }}
		</div>

		<div class="large-12 columns">
		<br><br>
			{{ Form::submit('Update' , $attributes = array('class' => 'size-14 nsi-btn button tiny radius right', 'name' => 'submit')) }}
		</div>
		<a class="close-reveal-modal">&#215;</a>
	</div>
	{{ Form::close() }}
</div>



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
			{{ Form::submit('Import File', ["class"=>"button tiny nsi-btn radius size-14 right", "onclick"=>"myFunction()"]) }}
			<br><br>
			<label class="size-14 label-black"><i>Uploading files may take time depending on the amount items you are importing to.</i></label>
		</div>
		<a class="close-reveal-modal">&#215;</a>
		{{ Form::close() }}
	</div>
</div>

<!-- PAYMENT BREAKDOWN -->
<div id="notify" class="reveal-modal medium" data-reveal>
{{ Form::open(array("url"=>"notify_students")) }}
	<div class="panel modal-title cus-pan-hd-3 radius">
		<label class="size-18 label-black large-12 label-ln-ht-1">Student's who will be notified</label>
	</div>
	<div class="row">
		<div class="large-12 columns" style=" margin-left: 1.5rem; ">
			<br><br>
			<table id="notif_students" class="dtable" style="width: 100%; margin-left: -4;"></table>
			<a class="close-reveal-modal" style=" margin-top: -2.5rem; ">&#215;</a>
		</div>
	</div>
	{{ Form::submit('Notify Students', ["class"=>"button tiny nsi-btn radius size-14 right"]) }}
{{ Form::close() }}
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
		<div class="large-12 columns" style=" margin-left: 1.5rem; ">
			<br><br>
			<table id="breakdown" class="dtable" style="width: 100%; margin-left: -4;"></table>
			<a class="close-reveal-modal" style=" margin-top: -2.5rem; ">&#215;</a>
		</div>
	</div>
</div>

<!-- PAYMENT HISTORY -->
<div id="payment_history" class="reveal-modal medium" data-reveal>
	<div class="panel modal-title cus-pan-hd-3 radius">
		<label class="size-18 label-black large-12 label-ln-ht-1">Payment History</label>
	</div>
	<div class="row">
		<div class="large-12 columns"  style=" margin-left: 1.5rem; ">
			<br><br>
			<table id="p_history" class="dtable" style="width: 100%; margin-left: -4;"></table>
			<a class="close-reveal-modal" style=" margin-top: -2.5rem; ">&#215;</a>
		</div>
	</div>
</div>
@endif

