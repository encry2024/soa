
<div class="large-2 small-12 columns" style=" border-right-style: solid; border-right-width: 2px; border-right-color: #DDD; margin-top: 2rem !important;">
	<div class="sidebar">
		<ul class="side-nav">

			<li>{{ Form::submit('Save', $attributes = array('class' => 'button radius login-btn large-10 label-white tiny size-14', 'title' => "Click update to change the Item's Information")) }}</li>
			<li>{{ link_to('/', 'Add Field', $attributes = array('class' => 'button radius login-btn large-10 label-white tiny size-14 add_field_button', 'title' => 'Return Home')) }}</li>
			</br></br></br>
			<li>{{ link_to('mainpage', 'Mainpage', array("class"=>"button radius login-btn large-10 label-white tiny size-14"))}}</li>

		</ul>
	</div>
</div>