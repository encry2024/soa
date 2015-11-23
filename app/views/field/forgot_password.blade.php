<br><br><br><br><br><br><br><br>
<div class="large-5 small-12 columns large-centered forgot_pass-container">
	<div class="row">
		<div class="large-12 small-12 ">
			<br>
			<label class="size-24 nsi-asset-fnt label-black left">Forgot Password</label>
			<br><br><br>
			{{ Form::email('email', '', ['class'=>'radius large-12', 'placeholder'=>"Enter your E-mail"]) }}
			<br>
			{{Form::submit('Change Password', ['class'=>'button login-btn small radius right size-14'])}}
		</div>
	</div>
</div>