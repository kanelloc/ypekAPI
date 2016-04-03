@extends('layouts.default')

@section('content')
	<h3>Station: {{$stationShow->stationName}}</h3>
	<hr>
	<div class="container">
		<h4>Csv's Table</h4>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th>#</th>
					<th>Uploaded Files</th>
					<th>Year</th>
					<th>Grim Type</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				@foreach($measuresShow as $measures)
					<tr class="success">
						<td class="col-md-1">{{$count}}</td>
						<td>{{$measures->fileName}}</td>
						<td>{{$measures->year}}</td>
						<td>{{$measures->type}}</td>
						<td class="col-md-1" align="center">
							<form action="{{route('admin.destroyCsv',[$stationShow->stationPass, $measures->fileName])}}" method="POST">
							{{csrf_field()}}
							<input type="hidden" name="_method" value="DELETE">
								<button type="submit" class="btn btn-danger btn-xs">
									<i class="glyphicon glyphicon-trash"></i>
								</button>
							</form>
						</td>
					</tr>
					<?php $count++; ?>
				@endforeach	
			</tbody>
		</table>
	</div>
@stop