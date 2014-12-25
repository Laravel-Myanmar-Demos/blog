@extends('layout.main')

@section('content')
	
	@include('layout.adminnav')	

	<div class="container">
	    <div class="col-md-12">
	    	@foreach($blogs as $blog)
	    		<div class="panel panel-default">
				  <div class="panel-body">
				    <a href="/blog/{{ $blog->id }}"><h1>{{{ $blog->title }}}</h1></a>
	    			<span>Submitted in {{ date("F j, Y, g:i a", strtotime($blog->created_at)) }}</span>
				  </div>
			    </div>
	    	@endforeach()	    	
	    	<div class="pull-right">{{ $blogs->links(); }}</div>
	    </div>
	</div>
@stop