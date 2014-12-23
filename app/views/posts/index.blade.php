@extends('layout.main')

@section('content')
	<style type="text/css">
		
	</style>

	@include('layout.adminnav')

	<div class="container">
		@if (Session::has('message'))
			<div class="col-md-12">
    			<div class="alert alert-info">{{ Session::get('message') }}</div>
    		</div>
		@endif
		<div class="col-md-12">
			<div class="pull-right">
				<a href="/admin/posts/create"><div class="btn btn-success">Add New Blog Post</div></a>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>ID</th>
						<th>BLOG TITLE</th>
						<th>View</th>
						<th>EDIT BLOG</th>
						<th>DELETE BLOG</th>
					</tr>
				</thead>
				<tbody>
					@foreach($blogs as $blog)
					<tr>
						<td>{{ $blog->id }}</td>
						<td>{{ $blog->title }}</td>
						<td><a class="btn btn-default" href="{{ URL::to('admin/posts/' . $blog->id) }}">View this blog! </a></td>
						<td><a class="btn btn-primary" href="{{ URL::to('admin/posts/' . $blog->id . '/edit') }}">Edit Blog</a></td>
						<td>
							{{ Form::open(array('url' => 'admin/posts/' . $blog->id)) }}
								{{ Form::hidden('_method', 'DELETE') }}
								{{ Form::submit('Delete this Blog Post', array('class' => 'btn btn-danger')) }}
							{{ Form::close() }}
						</td>
					</tr>
					@endforeach()
				</tbody>
			</table>
		</div>
	</div>
@stop