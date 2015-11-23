



<div class="large-2 small-12 columns" style=" border-right-style: solid; border-right-width: 2px; border-right-color: #DDD; margin-top: 2rem !important;">
	<div class="sidebar">
		<ul class="side-nav">
			@if ( Auth::user()->type == "admin")
				<li>{{ link_to("#", "Add Cashier", ["class"=>"button radius login-btn large-10 label-white tiny size-14", 'data-reveal-id' => 'add_user' ,"style"=>" margin-left: 1rem; "]) }}</li>
				<li>{{ link_to("#", "Set Due Date", ["class"=>"button radius login-btn large-10 label-white tiny size-14", 'data-reveal-id' => 'due_date' ,"style"=>" margin-left: 1rem; ", 'Title'=>"Set's all of the students due dates."]) }}</li>
				<li>{{ link_to("unpaid_students", "View Unpaid Balance", ["class"=>"button radius login-btn large-10 label-white tiny size-14","style"=>" margin-left: 1rem; ", 'Title'=>"View all student who has unpaid balance."]) }}</li>
			
			@endif
				
			@if (Auth::user()->type != "student")
				<li>{{ link_to('#', 'Import SOA', array('class' => 'button radius size-14 login-btn label-white large-10 tiny', 'data-reveal-id' => 'import_modal', "style"=>" margin-left: 1rem; ", 'title' => 'Import an XLS files.' )) }}</li>
				<li>{{ link_to('#', 'Import Daily Report', array('class' => 'button size-14 radius login-btn label-white large-10 tiny', 'data-reveal-id' => 'payment_modal', "style"=>" margin-left: 1rem; ", 'title' => 'Import an XLS files.' )) }}</li>
				<li>{{ link_to('student/data/information', 'Add Information', $attributes = array('class' => 'button size-14 radius login-btn label-white large-10 tiny', 'title' => 'Add Student Information', "style"=>" margin-left: 1rem; ")) }}</li>
				<li>{{ link_to("", "Notify Students", ["class"=>"button radius login-btn large-10 label-white tiny size-14","style"=>" margin-left: 1rem; ", 'data-reveal-id' => 'notify' ,'Title'=>"View all student who has unpaid balance."]) }}</li>
			@endif

			@if(Auth::user()->type == "student")
				<li>{{ link_to('#', 'Payment Breakdown', ['class'=>'large-10 button login-btn tiny radius right size-14', 'data-reveal-id' => 'payment_breakdown']) }}</li>
				<li>{{ link_to('#', 'Payment History', ['class'=>'large-10 button login-btn tiny radius right size-14', 'data-reveal-id' => 'payment_history']) }}</li>
			@endif
				
		</ul>
	</div>
</div>