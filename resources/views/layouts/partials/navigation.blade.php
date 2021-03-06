<nav class="navbar navbar-inverse navbar-static-top">
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
            <a class="navbar-brand" href="{{ url('/') }}">
                 Grimapy
            </a>
		</div>
		<div class="collapse navbar-collapse" id="app-navbar-collapse">
			<!-- Left Side Of Navbar -->
			<ul class="nav navbar-nav navbar-left">
				
			</ul>
			
			<!-- Right Side Of Navbar -->
			<ul class="nav navbar-nav navbar-right">
				@if(Auth::check())
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
							Welcome
							{{Auth::user()->username}} <span class="caret"></span>
						</a>

						<ul class="dropdown-menu" role="menu">
                                @if(Auth::check() && !Auth::user()->admin)
									<li><a href="{{route('user.profile')}}"><i class="fa fa-user"></i>Profile</a></li>
								@endif
								<li><a href="{{ route('auth.signout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                        </ul>

					</li>
				@else
					<li ><a href="{{ url('/signin') }}">Sign In</a></li>
                	<li ><a href="{{ url('/signup') }}">Sign Up</a></li>
                @endif
			</ul>
		</div>
	</div>
</nav>