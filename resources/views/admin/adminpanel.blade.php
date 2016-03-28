@extends('layouts.default')

@section('content')
	<div class="jumbotron">
		<h1>This is the admin panel</h1>
		<p>You can add and customize the stations</p>
		<div class="row">
			<div class="col-sm-4">
				<a href="/stations/create" class="btn btn-primary">Create a station</a>
			</div>
			<div class="col-sm-4">
				<a href="#" class="btn btn-primary">Example</a>
			</div>
			<div class="col-sm-4">
				<a href="/stations" class="btn btn-primary">Stations Panel</a>
			</div>
		</div>
	</div>
	<hr>
@stop