@extends('layout.main')

@section('content')
	<style type="text/css">
		.login-form {
			width: 248px;
			margin: 0 auto;
		}
		.container {
			padding: 10px;
		}
	</style>

	<div class="container">
	    {{ Form::open(array('/admin', 'role' => 'form', 'class' => 'login-form')) }}

	    	<h1>Please Login</h1>

			<div class="form-group">
				@if(!empty($errors->first("email")))
					<div class="alert alert-danger">{{ $errors->first("email") }}</div>
				@endif
				{{ Form::label('email', 'Email Address') }}
				{{ Form::text('email', '',array('class' => 'form-control', 'placeholder' => 'Enter email')) }}
			</div>
			<div class="form-group">
				@if(!empty($errors->first("password")))
					<div class="alert alert-danger">{{ $errors->first("password") }}</div>
				@endif
				{{ Form::label('passowrd', 'Password') }}
				{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
			</div>
			{{ Form::submit('Sign in', array('class' => 'btn btn-primary')) }}
		{{ Form::close() }}
		
	</div>
@stop