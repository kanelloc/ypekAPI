@extends('layouts.default')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Sign In</div>
				<div class="panel-body">
					<form action="{{route('auth.signin')}}" class="form-horizontal" role='form' method="POST">
						<div class="form-group {{$errors->has('email') ? ' has-error' : ''}}">
							<label for="email" class="col-md-4 control-label">E-mail Address</label>
							<div class="col-md-6">
								<input type="text" name="email" class="form-control" id="email">
								<!--Show errors -->
								@if($errors->has('email'))
									<span class="help-block">{{$errors->first('email')}}</span>
								@endif
							</div>
						</div>

						<div class="form-group {{$errors->has('password') ? ' has-error' : ''}}">
							<label for="password" class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" name="password" class="form-control" id="password">
								<!--Show errors -->
								@if($errors->has('password'))
									<span class="help-block">{{$errors->first('password')}}</span>
								@endif
							</div>
						</div>

						<div class="form-group">
							<div class="cold-md-6 col-md-offset-4">
								<div class="checkbox">
									<label>
										<input type="checkbox" name="remember"> Remember me
									</label>
								</div>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									<i class="fa fa-btn fa-sign-in">
										Login
									</i>
								</button>
							</div>
						</div>

						<input type="hidden" name="_token" value="{{ csrf_token() }}">
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@stop