



<br><br><br><br>
<div class="large-8 small-12 columns large-centered mainpage-container input_fields_wrap right" >
	<div class="row">
		<div class="large-12 small-12 large-centered">
			<br><br><br>
			@if ($notification = Session::get('message'))
				<div data-alert class="alert-box success ">
					{{ $notification }}
					<a href="#" class="close">&times;</a>
				</div>
			@endif
			@if ($notification = Session::get('deleteMessage'))
				<div data-alert class="alert-box success ">
					{{ $notification }}
					<a href="#" class="close">&times;</a>
				</div>
			@endif
			<h1><label class="push-1 label-black size-24 nsi-asset-fnt"># Student's Data Fields</label></h1>
			<br><br><br>
			@foreach ($fields as $field)
				<div class="row">
					<div class="large-5 columns">
						{{ Form::text('', $field->student_label, array('name' => 'field-'.$field->id, 'class'=>'inputField radius')) }}
					</div>
						{{ link_to('field/'.$field->id.'/delete/', 'Remove', $attributes = array('class' => 'size-14 button tiny radius delete_field', "style"=>" padding-bottom: 0.5rem !important; padding-top: 0.6225rem !important;", 'title' => 'Delete this Field', 'id' => $field->id )) }}	
				</div>
			@endforeach
		</div>
	</div>
</div>