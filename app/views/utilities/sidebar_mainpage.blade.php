



<div class="large-2 small-12 columns" style=" border-right-style: solid; border-right-width: 2px; border-right-color: #DDD; margin-top: 2rem !important;">
	<div class="sidebar">
		<ul class="side-nav">
			@if ( Auth::user()->type == "admin")
				<li>{{ link_to("#", " Add", ["class"=>"button radius login-btn large-12 label-white tiny size-14 fi-asterisk", 'data-reveal-id' => 'add_user' ,"style"=>" margin-left: 1rem; "]) }}</li>
			@endif
				
			@if (Auth::user()->type != "student")
				<li>{{ link_to('#', ' Import SOA', array('class' => 'button radius size-14 login-btn fi-asterisk label-white large-12 tiny', 'data-reveal-id' => 'import_modal', "style"=>" margin-left: 1rem; ", 'title' => 'Import an XLS files.' )) }}</li>
				<li>{{ link_to('#', ' Import Daily Report', array('class' => 'button size-14 radius login-btn fi-asterisk label-white large-12 tiny', 'data-reveal-id' => 'payment_modal', "style"=>" margin-left: 1rem; ", 'title' => 'Import an XLS files.' )) }}</li>
			@endif

			@if(Auth::user()->type == "student")
				<li>{{ link_to('#', 'Payment Breakdown', ['class'=>'button login-btn small radius right size-14', 'data-reveal-id' => 'payment_breakdown']) }}</li>
				<li>{{ link_to('#', 'Per/Sem Breakdown', ['class'=>'button login-btn small radius right size-14', 'data-reveal-id' => 'persem']) }}</li>
			@endif
		</ul>
	</div>
</div>