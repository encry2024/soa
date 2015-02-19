@extends('Template.Template')

@section('head')
@endsection

@section('body')
	{{ Form::open(array('url' => 'student/register')) }}
	<!-- REGISTRATION FIELD -->
	@include('field.student_reg')
	<!--  -->
	{{ Form::close() }}
@endsection