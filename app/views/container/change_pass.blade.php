@extends('Template.Template')

@section('head')
<!-- LOGIN UTILITIES -->
	@include('utilities.mainpage')
<!--  -->
@endsection

@section('body')
	{{ Form::open(array('url'=>'ch_password')) }}
		<!--  -->
		@include('field.change_pass')
		<!--  -->
	{{ Form::close() }}
@endsection

@section('style')
@endsection