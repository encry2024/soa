@extends('Template.Template')

@section('head')
<!-- LOGIN UTILITIES -->
	@include('utilities.login')
<!--  -->
@endsection

@section('body')
{{ Form::open(array('url'=>'authenticate')) }}
	<!--  -->
	@include('field.login')
	<!--  -->
{{ Form::close() }}
@endsection

@section('style')
<style type="text/css">
	body {
		background-color: #F5F5F5 !important;
	}
</style>
@endsection