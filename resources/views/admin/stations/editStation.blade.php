@inject('years', 'App\Http\Utilities\Years')
@inject('dirtTypes', 'App\Http\Utilities\DirtTypes')
@extends('layouts.default')

@section('content')
	<h1>Edit Station {{$stationEdit->stationName}}</h1>
	<hr>
	<form method="POST" action="" enctype="multipart/form-data">
		{{csrf_field()}}
		<div class="form-group">
		  <label for="measureYear">Χρονιά Μετρήσεων:</label>
		  <select class="form-control" id="measureYear" name="MeasureYear">
		    @foreach($years::all() as $year)
		    	<option value="{{ $year }}">{{ $year }}</option>
		    @endforeach
		  </select>
		</div>

		<div class="form-group">
		  <label for="measureType">Τύπος Ρύπου:</label>
		  <select class="form-control" id="measureType" name="measureType">
		    @foreach($dirtTypes::all() as $dirtType => $code)
		    	<option value="{{ $code }}">{{ $dirtType }}</option>
		    @endforeach
		  </select>
		</div>

		<div class="form-group">
			<label for="csvFile">CSV:</label>
			<input type="file" accept=".dat, .csv, .xlsx" name="csvFiles" id="csvFile" class="form-control">
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-primary">Save</button>
		</div>
	</form>
@stop