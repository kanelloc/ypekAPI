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
			<a class="navbar-brand" href="{{ url('/') }}">Grimapy</a>
		</div>
		<!-- Top Menu Items -->
		<!-- Right Side Of Navbar -->
		<div class="collapse navbar-collapse" id="app-navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				@if(Auth::check())
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							Welcome
							{{Auth::user()->username}} <span class="caret"></span>
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
                <li class="active">
                    <a href="index.html"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                </li>
                <li>
                    <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                </li>
                <li>
                    <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
                </li>
                <li>
                    <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
                </li>
                <li>
                    <a href="bootstrap-elements.html"><i class="fa fa-fw fa-desktop"></i> Bootstrap Elements</a>
                </li>
            </ul>
		</div>
	</div>
</nav>