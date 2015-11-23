@extends('Template.Template')

@section('head')
	@include('utilities.mainpage')
@endsection

@section('body')
	{{ Form::open(array('url'=>'add/field')) }}
	<!-- SIDEBAR -->
	@include('utilities.info_sidebar')
	<!-- EDIT FIELD -->
	@include('field.field')
	{{ Form::close() }}
@endsection

@section('scripts')
	<script type="text/javascript">
	$(document).ready(function() {
		var max_fields      = 100; //maximum input boxes allowed
		var wrapper         = $(".input_fields_wrap"); //Fields wrapper
		var add_button      = $(".add_field_button"); //Add button ID

		var x = 1; //initlal text box count
		$(add_button).click(function(e){ //on add input button click
			e.preventDefault();
			if(x < max_fields){ //max input box allowed
				x++; //text box increment
				$(wrapper).append('<div class="row"><div class="large-12 columns large-centered"><div class="row"><div class="large-5 columns"><input type="text" class="inputField radius" style=" margin-left: -1rem; width: 103.5%; " name="mytext[]" placeholder="Enter Students Data Field" Title="This pertains to the headers of the XLS."/></div><a href="#" id="Font" class="size-14 button tiny remove_field radius" style=" padding-bottom: 0.5rem !important; padding-top: 0.6225rem !important;">Remove</a></div></div></div>'); //add input box
			}
		});

		$(wrapper).on("click",".remove_field", function(e){ //user click on remove text
		e.preventDefault(); $(this).parent('div').remove(); x--;
		});
	});
	</script>
@endsection

@section('style')
@endsection