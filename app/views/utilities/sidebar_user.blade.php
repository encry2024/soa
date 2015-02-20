



<div class="large-2 small-12 columns" style=" border-right-style: solid; border-right-width: 2px; border-right-color: #DDD; margin-top: 2rem !important;">
	<div class="sidebar ">
		<ul class="side-nav">
			@if (Auth::user()->type != 'student')
				<li>{{Form::submit('Update Payment', ['class'=>'button login-btn small radius right size-14'])}}</li>
				{{ link_to('#', 'Payment Breakdown', ['class'=>'button login-btn small radius right size-14', 'data-reveal-id' => 'payment_breakdown']) }}
			@else
				<li>{{ link_to('#', 'Payment Breakdown', ['class'=>'button login-btn small radius right size-14', 'data-reveal-id' => 'payment_breakdown']) }}</li>
			@endif
			
			<br><br>
			<li>{{ link_to("mainpage", "  Home", ["class"=>"label-white lrv-link tiny size-14 fi-asterisk","style"=>" margin-left: 5rem; "]) }}</li>
		</ul>
	</div>
</div>