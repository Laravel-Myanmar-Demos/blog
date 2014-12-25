@extends('layout.main')

@section('content')

	@include('layout.adminnav')
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-default">
			  <div class="panel-body">
				<h1>{{ $blog->title }}</h1>
	      		<span>Submitted in {{ date("F j, Y, g:i a", strtotime($blog->created_at)) }}</span>
		        <p class="lead">{{ $blog->body }}</p>
			  </div>
			</div>
		</div>
		<div class="col-md-12">
			<hr>
			@foreach($blog->comments as $comment)
					<span>{{{ $comment->name }}}</span>
					<p class="lead">{{{ $comment->comment }}}</p>
				<hr>
			@endforeach
		</div>
		<div class="col-md-12">
			{{ Form::open(array('url' => '/blog/comment/'. $blog->id, 'role' => 'form')) }}
	            <div class="form-group">
	            	@if(!empty($errors->first('name')))
	              		<div class="alert alert-danger">{{ $errors->first('name') }}</div>
	            	@endif
	            	{{ Form::label('name', 'Your Name') }}
	            	{{ Form::text('name', $value = null, array('class' => 'form-control', 'placeholder' => 'Your Name')) }}
	          	</div>

	          	<div class="form-group">
	            	@if(!empty($errors->first('comment')))
	             		<div class="alert alert-danger">{{ $errors->first('comment') }}</div>
	            	@endif
	            	{{ Form::label('comment', 'Comment') }}
	            	{{ Form::textarea('comment', $value = null, array('class' => 'form-control', 'rows' => '4')) }}
	          	</div>
          		{{ Form::submit('Comment Now', array('class' => 'btn btn-default')) }}
      		{{ Form::close() }}
		</div>
	</div>
@stop