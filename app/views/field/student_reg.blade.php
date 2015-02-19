<div class="large-6 columns large-centered">
	<div class="row">
		@if ($alert = Session::get('success_message'))
			<div data-alert class="alert-box success ">
				<label class="text-center label-white">{{ $alert }}</label>
				<a href="#" class="close ">&times;</a>
			</div>
			<br>
		@endif
		<h1 class="text-center">Student Registration</h1>
		<br>
		{{ Form::text('name', $student_info->student_name, ['class'=>'error radius size-20 text-center text-height-5 textbox-height', 'name'=>'name', 'readOnly']) }}
		@if ($errors->has('name')) <small class="error"><i class="fi-alert"> </i>{{ $errors->first('name') }}</small> @endif
		<br>
		{{ Form::text('username', $student_info->student_no, ['class'=>'error radius size-20 text-center text-height-5 textbox-height', 'placeholder'=>'Enter Username', 'name'=>'username', 'readOnly']) }}
		@if ($errors->has('username')) <small class="error"><i class="fi-alert"> </i>{{ $errors->first('username') }}</small> @endif
		<br>
		{{ Form::password('password', ['class'=>'error radius size-20 text-center text-height-5 textbox-height', 'placeholder'=>'Enter Password', 'name'=>'password']) }}
		@if ($errors->has('password')) <small class="error"><i class="fi-alert"> </i>{{ $errors->first('password') }}</small> @endif
		<br>
		{{ Form::password('password_confirmation', ['class'=>'error radius size-20 text-center text-height-5 textbox-height', 'placeholder'=>'Confirm Password']) }}
		@if ($errors->has('password_confirmation')) <small class="error"><i class="fi-alert"> </i>{{ $errors->first('password_confirmation') }}</small> @endif
		<br><br><br>
		{{ Form::submit('Create Account', ["class"=>"button radius right"]) }}
	</div>
</div>