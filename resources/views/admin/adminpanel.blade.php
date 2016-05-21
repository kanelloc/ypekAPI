@extends('layouts.default')
@section('content')
	<h3>Admin infos and statistics</h3>
	<hr>
	<hr>
	<div class="container">
		<h4>API Statistics</h4>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th class="text-center">Stations Req.</th>
					<th class="text-center">Spesific Req.</th>
					<th class="text-center">Average Req.</th>
					<th class="text-center">All req.</th>
				</tr>
			</thead>
			<tbody>
				<tr class="success">
					<td align="center">{{$stationRequestAll}}</td>
					<td align="center">{{$spesificRequestAll}}</td>
					<td align="center">{{$averageRequestAll}}</td>
					<td align="center">{{$allRequests}}</td>
				</tr>
			</tbody>
		</table>
		
		<hr>

		<h4>Registered users with API key</h4>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th class="text-center">#</th>
					<th class="text-center">Username</th>
					<th class="text-center">Stations Requests</th>
					<th class="text-center">Specific Requests</th>
					<th class="text-center">Averages Requests</th>
					<th class="text-center">Summary Requests</th>
				</tr>
			</thead>
			<tbody>
				@foreach($userForDetails as $user)
					@if($user->admin == 0 && $user->user_details)
						<tr>
							<td class="col-md-1" align="center">{{$count}}</td>
							<td class="col-md-2" align="center">{{$user->username}}</td>
							<td class="col-md-2" align="center">{{$user->user_details->counter_stations}}</td>
							<td class="col-md-2" align="center">{{$user->user_details->counter_absolute}}</td>
							<td class="col-md-2" align="center">{{$user->user_details->counter_average}}</td>
							<td class="col-md-2" align="center">{{$user->user_details->counter_all}}</td>
						</tr>
						<?php $count++ ?>
					@endif
				@endforeach
			</tbody>
		</table>

		<hr>

		<h4>Top 10 users with most requests</h4>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th class="text-center">#</th>
					<th class="text-center">Username</th>
					<th class="text-center">Stations Requests</th>
					<th class="text-center">Specific Requests</th>
					<th class="text-center">Averages Requests</th>
					<th class="text-center">Summary Requests</th>
				</tr>
			</thead>
			<tbody>
				@foreach($top10users as $user)
					<tr class="success">
						<td class="col-md-1" align="center">{{$count3}}</td>
						<td class="col-md-2" align="center">{{$user->username}}</td>
						<td class="col-md-2" align="center">{{$user->counter_stations}}</td>
						<td class="col-md-2" align="center">{{$user->counter_absolute}}</td>
						<td class="col-md-2" align="center">{{$user->counter_average}}</td>
						<td class="col-md-2" align="center">{{$user->counter_all}}</td>
					</tr>
					<?php $count3++ ?>
				@if($count3 == 11)
					<?php break; ?>
				@endif	
				@endforeach
			</tbody>
		</table>

		<hr>

		<h4>Registered users without API key</h4>
		<table class="table table-bordered table-striped">
			<thead>
				<tr>
					<th class="text-center">#</th>
					<th class="text-center">Username</th>
					<th class="text-center">Created at</th>
				</tr>
			</thead>
			<tbody>
				@foreach($userForDetails as $user)
					@if($user->admin == 0 && !$user->user_details)
						<tr class="danger">
							<td class="col-md-1" align="center">{{$count2}}</td>
							<td align="center">{{$user->username}}</td>
							<td align="center">{{$user->created_at}}</td>
						</tr>
						<?php $count2++ ?>
					@endif
				@endforeach
			</tbody>
		</table>
	</div>
@stop