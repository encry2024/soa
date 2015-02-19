@extends('Template.Template')

@section('head')
	<!-- USER TOPBAR -->
	@include('utilities.topbar_user')
	<!--  -->
@endsection

@section('body')
@if ($user->type != "student")
{{ Form::open(array('url'=>'grant_access')) }}
	<!-- USER SIDEBAR -->
		@include('utilities.sidebar_user')
	<!--  -->
	
	<!-- USER FIELD -->
		@include('field.user')
	<!--  -->
{{ Form::close() }}
@else
{{ Form::open(array('url'=>'update/'.$user->id.'/balance')) }}
	<!-- USER FIELD -->
		@include('field.user')
	<!--  -->
{{ Form::close() }}
@endif
@endsection