@if ($alert = Session::get('flash_error'))
	<div data-alert class="alert-box alert ">
		<label class="text-center label-white">{{ $alert }}</label>
		<a href="#" class="close ">&times;</a>
	</div>
@endif
<br><br><br>
<div class="row">
	<div class="large-12 columns  large-centered">
	
	<br><br>
	<div class="large-6 columns large-centered">
	{{ link_to('forgot_password', 'Forgot Password', ['class'=>'right label-white']) }}
	</div>
	<br><br>

		<div class="large-6 columns large-centered">
			{{ Form::text('username', '', ['class'=>'error radius size-18 text-center font-style-segoe text-height-3', 'placeholder'=>'Enter your Username', 'id'=>'', 'name'=>'username']) }}
			@if ($errors->has('username')) <small class="error"><i class="fi-alert"> </i>{{ $errors->first('username') }}</small> @endif
		</div>
		
		<br>
		
		<div class="large-6 columns large-centered">
			{{ Form::password('password', ['class'=>'error radius size-18 large-10 text-center font-style-segoe text-height-3', 'placeholder'=>'Enter your Password', 'id'=>'', 'name'=>'password']) }}
			@if ($errors->has('password')) <small class="error"><i class="fi-alert"> </i>{{ $errors->first('password') }}</small> @endif
		</div>
		
		<br>
		<div class="large-6 small-12 columns large-centered">
			<button class="button login-btn small radius left size-14" type="submit" style="border-radius: 30px;">
				<i class="fi-check"></i>
				<span>Login</span>
			</button>
		</div>
			<div class="large-6 small-12 columns large-centered">
			<a href="{{ URL::to('/sentry/student') }}" class="button login-btn small radius right size-14" type="submit" style="border-radius: 30px;">
				<i class="fi-torsos-all"></i>
				<span>Student Registration</span></a>
		</div>
		<br><br>
	</div>
</div>