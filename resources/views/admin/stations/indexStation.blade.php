@extends('layouts.default')

@section('content')
	<h3>This is the index stations</h3>
	<div class="container">
		<h4>Stations Table</h4>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Station Name</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				@foreach($stations as $station)
					<tr class="success">
						<td>{{$count}}</td>
						<td>{{$station->stationPass}}</td>
						<td><a href="#" class="btn btn-primary btn-xs">
								<span class="glyphicon glyphicon-pencil"></span>
							</a>
						</td>
						<td><a href="#" class="btn btn-danger btn-xs">
								<span class="glyphicon glyphicon-trash"></span>
							</a>
						</td>
						<?php $count++; ?>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop