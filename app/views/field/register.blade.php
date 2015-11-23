<div class="large-6 columns large-centered">
	<div class="row">
		@if ($alert = Session::get('success_message'))
			<div data-alert class="alert-box success ">
				<label class="text-center label-white">{{ $alert }}</label>
				<a href="#" class="close ">&times;</a>
			</div>
			<br>
		@endif
		<h1 class="text-center">User Registration</h1>
		<br>
		{{ Form::text('firstname', '', ['class'=>'error radius size-20 text-center text-height-5 textbox-height', 'placeholder'=>'Enter Firstname', 'name'=>'firstname']) }}
		@if ($errors->has('firstname')) <small class="error"><i class="fi-alert"> </i>{{ $errors->first('firstname') }}</small> @endif
		<br>
		{{ Form::text('lastname', '', ['class'=>'error radius size-20 text-center text-height-5 textbox-height', 'placeholder'=>'Enter Lastname', 'name'=>'lastname']) }}
		@if ($errors->has('lastname')) <small class="error"><i class="fi-alert"> </i>{{ $errors->first('lastname') }}</small> @endif
		<br>
		{{ Form::text('username', '', ['class'=>'error radius size-20 text-center text-height-5 textbox-height', 'placeholder'=>'Enter Username', 'name'=>'username']) }}
		@if ($errors->has('username')) <small class="error"><i class="fi-alert"> </i>{{ $errors->first('username') }}</small> @endif
		<br>
		{{ Form::text('email', '', ['class'=>'error radius size-20 text-center text-height-5 textbox-height', 'placeholder'=>'Enter your Email', 'name'=>'email']) }}
		@if ($errors->has('email')) <small class="error"><i class="fi-alert"> </i>{{ $errors->first('email') }}</small> @endif
		<br>
		{{ Form::password('password',['class'=>'error radius size-20 text-center text-height-5 textbox-height', 'placeholder'=>'Enter Password', 'name'=>'password']) }}
		@if ($errors->has('password')) <small class="error"><i class="fi-alert"> </i>{{ $errors->first('password') }}</small> @endif
		<br>
		{{ Form::password('password_confirmation', ['class'=>'error radius size-20 text-center text-height-5 textbox-height', 'placeholder'=>'Confirm Password']) }}
		@if ($errors->has('password_confirmation')) <small class="error"><i class="fi-alert"> </i>{{ $errors->first('password_confirmation') }}</small> @endif
		<br>
		
		<br><br><br>
		{{ Form::submit('Create Account', ["class"=>"button radius right"]) }}
	</div>
</div>