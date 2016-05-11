@extends('layouts.default')

@section('content')
	<h3>User Profile Panel</h3>
	<hr>
	<div class="container">
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>Username</th>
					<th>User email</th>
					<th>Api key</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>{{$name}}</td>
					<td>{{$email}}</td>
					<td>{{$active_api}}</td>
				</tr>
			</tbody>
		</table>
	</div>
	<form method="POST" action="{{route('user.getApikey')}}" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="form-group">
			<button type="submit" class="btn btn-primary">Get Api key</button>
		</div>
	</form>

	<a href="{{route('api.showApiStations',[$active_api])}}" class="btn btn-info" role="button">Show stations Json format</a>
@stop