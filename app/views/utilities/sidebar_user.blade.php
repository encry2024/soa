



<div class="large-2 small-12 columns" style=" border-right-style: solid; border-right-width: 2px; border-right-color: #DDD; margin-top: 2rem !important;">
	<div class="sidebar ">
		<ul class="side-nav">
			@if (Auth::user()->type != 'student')
				<li></li>
				<li>{{ link_to('#', ' Student Information', ['class'=>'text-left fi-torso button login-btn tiny large-12 radius right size-14', 'data-reveal-id' => 'user_info',"style"=>" margin-right: -0.01rem; " ]) }}</li>
				<li>{{ link_to('print/student/'.$user->username.'/soa', ' Print SOA', ['class'=>'text-left fi-print button login-btn large-12 tiny radius right size-14', "style"=>" margin-right: -0.01rem; "]) }}</li>
				<li>{{ link_to('#', ' Payment Breakdown', ['class'=>'fi-list text-left button login-btn tiny large-12 radius right size-14', 'data-reveal-id' => 'payment_breakdown', "style"=>" margin-right: -0.01rem; "]) }}</li>
				<li>{{ link_to('mainpage', ' Home', ['class'=>'text-left fi-home button login-btn tiny large-12 radius right size-14', "style"=>" margin-right: -0.01rem; "]) }}</li>
				
			@else
				<li>{{ link_to('#', 'Payment Breakdown', ['class'=>' button login-btn tiny radius right size-14', 'data-reveal-id' => 'payment_breakdown']) }}</li>
			@endif
			<br><br>
		</ul>
	</div>
</div>