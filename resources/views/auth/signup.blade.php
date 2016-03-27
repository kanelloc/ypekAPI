@extends('layouts.default')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Sign up</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="{{ route('auth.signup') }}">
						<div class="form-group{{$errors->has('email') ? ' has-error' : ''}}">
							<label for="email" class="col-md-4 control-label">E-mail Address</label>
							<div class="col-md-6">
								<input type="text" name="email" class="form-control" id="email" value="{{Request::old('email')?: ''}}">
								<!--Show error message -->
								@if($errors->has('email'))
									<span class="help-block">{{$errors->first('email')}}</span>
								@endif
							</div>
						</div>
						<!-- -->
						<div class="form-group{{$errors->has('username') ? ' has-error' : ''}}">
							<label for="username" class="col-md-4 control-label">Username</label>
							<div class="col-md-6">
								<input type="text" name="username" class="form-control" id="username" value="{{Request::old('username')?: ''}}">
								<!--Show error message -->
								@if($errors->has('username'))
									<span class="help-block">{{$errors->first('username')}}</span>
								@endif
							</div>
						</div>
						<!-- -->
						<div class="form-group {{$errors->has('password') ? ' has-error' : ''}}">
							<label for="password" class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" name="password" class="form-control" id="password" value="">
								<!--Show error message -->
								@if($errors->has('password'))
									<span class="help-block">{{$errors->first('password')}}</span>
								@endif
							</div>
						</div>
						<!-- -->
						<div class="form-group">
							<label for="password" class="col-md-4 control-label">Confirm Password</label>
							<div class="col-md-6">
								<input type="password" name="password_confirmation" class="form-control">
							</div>
						</div>
						<!-- -->
						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									<i class="fa fa-btn fa-user"></i>
									Register
								</button>
							</div>
						</div>
						<input type="hidden" name="_token" value="{{Session::token()}}">
					</form>
				</div>
			</div>
		</div>	
	</div>
</div>
@stop