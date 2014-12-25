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
	</div>
@stop

