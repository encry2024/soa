@extends('Template.Template')

@section('head')
<!-- LOGIN UTILITIES -->
	@include('utilities.login')
<!--  -->
@endsection

@section('body')
{{ Form::open(array('url'=>'f_password')) }}
	<!--  -->
	@include('field.forgot_password')
	<!--  -->
{{ Form::close() }}
@endsection

@section('style')
@endsection