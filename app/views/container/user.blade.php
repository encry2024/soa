@extends('Template.Template')

@section('head')
	<!-- USER TOPBAR -->
	@include('utilities.topbar_user')
	<!--  -->
@endsection

@section('body')

	@if (Auth::user()->type != "student")
	{{ Form::open(array('url'=>'student/'.$u_a->id.'/update/payment')) }}
		<!-- USER SIDEBAR -->
			@include('utilities.sidebar_user')
		<!--  -->
		
		<!-- USER FIELD -->
		
			@include('field.user')
		<!--  -->
	{{ Form::close() }}

	@else
		<!-- USER FIELD -->
			@include('field.user')
		<!--  -->
	@endif
@endsection

@section('scripts')
<script type="text/javascript">
	$('#dp1').fdatepicker({
		format: 'mm/dd/yyyy',
	});
	$('#dp2').fdatepicker({
		format: 'mm/dd/yyyy',
	});
	$('#dp3').fdatepicker({
		format: 'mm/dd/yyyy',
	});
	$('#dp4').fdatepicker({
		format: 'mm/dd/yyyy',
	});
	$('#dp5').fdatepicker({
		format: 'mm/dd/yyyy',
	});
</script>
@endsection