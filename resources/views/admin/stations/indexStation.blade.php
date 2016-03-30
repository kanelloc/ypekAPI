@extends('layouts.default')

@section('content')
	<h3>Station's Home</h3>
	<hr>
	<div class="container">
		<h4>Stations Table</h4>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Station Name</th>
					<th>Show</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				@foreach($stations as $station)
					<tr class="success">
						<td class="col-md-1">{{$count}}</td>
						<td>{{$station->stationName}}</td>
						<td class="col-md-1" align="center"><a href="{{route('stations.show',[$station->stationPass])}}" class="btn btn-primary btn-xs">
								<span class="glyphicon glyphicon-eye-open"></span>
							</a>
						</td>
						<td class="col-md-1" align="center"><a href="{{route('stations.edit',[$station->stationPass])}}" class="btn btn-primary btn-xs">
								<span class="glyphicon glyphicon-pencil"></span>
							</a>
						</td>
						<td class="col-md-1" align="center">
							<form action="{{ route('stations.destroy',[$station->stationPass])}}" method="post">
								{{csrf_field()}}
								<input type="hidden" name="_method" value="DELETE">
								<button type="submit" class="btn btn-danger btn-xs">
									<i class="glyphicon glyphicon-trash"></i>
								</button>
							</form>
						</td>
						<?php $count++; ?>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop