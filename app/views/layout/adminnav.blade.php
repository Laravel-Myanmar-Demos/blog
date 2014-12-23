<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	      <span class="sr-only">Toggle navigation</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand" href="/">Laravel BLOG</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li><a href="/">BLOGS</a></li>
			</ul>
			@if(Auth::check())
  			<ul class="nav navbar-nav navbar-right">
  				<li><p class="navbar-text pull-right">Signed in as <a href="/admin/posts" class="navbar-link">{{ Auth::user()->username }}</a></p></li>
  				<li><a href="/admin/logout">Logout</a></li>
  			</ul>
			@else
				<ul class="nav navbar-nav navbar-right">
					<li><a href="/admin">Sign in</a></li>
				</ul>
			@endif
		</div>
</nav>