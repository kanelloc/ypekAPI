<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- Branding Image -->
			<a class="navbar-brand" href="{{ url('/') }}">Grimapy</a>
		</div>
		<!-- Top Menu Items -->
		<!-- Right Side Of Navbar -->
		<div class="collapse navbar-collapse" id="app-navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				@if(Auth::check())
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							<span class="fa fa-user"></span>
							{{Auth::user()->username}} 
							<span class="caret"></span>
						</a>

						<ul class="dropdown-menu" role="menu">
		                        <li><a href="{{ route('auth.signout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
		                </ul>

					</li>
				@else
					<li ><a href="{{ url('/signin') }}">Sign In</a></li>
		        	<li ><a href="{{ url('/signup') }}">Sign Up</a></li>
		        @endif
			</ul>

			<ul class="nav navbar-nav side-nav">
                <li>
                    <a href="/stations"><i class="fa fa-fw fa-table"></i> Station Panel</a>
                </li>
                <li>
                    <a href="/stations/create"><i class="fa fa-fw fa-edit"></i>Create a station</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-fw fa-users"></i>Registered Users</a>
                </li>
            </ul>
		</div>
	</div>
</nav>