
 


<div class="large-12 columns" style="background-color: #F5F5F5; border-bottom-style: solid; border-bottom-color: #DDD; border-bottom-width: 1px; height: 3rem;">
	<label style="margin-top: 0.5rem;" class="size-20 label-black">SOA :: Student Sentry</label>
</div>
@if ($notification = Session::get('error'))
<div class="large-12 columns">
	<div data-alert class="alert-box alert " style=" height: 3rem; margin-left: -0.95rem; margin-right: -0.95rem;">
		<label style="color: #f5f5f5;" class="size-14">{{ $notification }}</label>
		<a href="#" class="close">&times;</a>
	</div>
</div>
@endif

	


<div class="large-12 columns ">
	{{ Form::open(array('url' => 'student/access')) }}
	<br><br><br>
	<div class="large-5 columns large-centered">
		<label class="size-16 ">Enter your Student Number:</label>
		<br>
		{{ Form::text('student_no', '', array('class'=>'inputField text-center size-16 h-3 radius', 'placeholder'=>"Enter Student Number e.x ( ###-####-#### )", 'style'=>" border-bottom-left-radius: 0px")) }}
		{{ Form::submit('Submit', ["class"=>"login-btn button small radius right", "style"=>"border-width: 1px;"]) }}
	</div>
	
	
	<br><br><br>
{{ Form::close() }}
</div>