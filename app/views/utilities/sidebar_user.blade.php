



<div class="large-2 small-12 columns push-1" style=" border-right-style: solid; border-right-width: 2px; border-right-color: #DDD; margin-top: 2rem !important;">
	<div class="sidebar " style=" margin-right: 1rem; ">
		<ul class="side-nav">
			@if (Auth::user()->type != 'student')
				<li>{{ Form::submit('Update' , $attributes = array('class' => 'size-14 nsi-btn button tiny radius right', 'name' => 'submit')) }}</li><br>
			@endif
			
			<br><br>
			<li>{{ link_to("mainpage", "  Home", ["class"=>"label-white lrv-link tiny size-14 fi-asterisk","style"=>" margin-left: 5rem; "]) }}</li>
		</ul>
	</div>
</div>