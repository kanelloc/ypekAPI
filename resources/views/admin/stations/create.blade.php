@extends('layouts.default')

@section('content')
	<h3>Add a new Station</h3>

	<form>
		<div class="form-group">
			<label for="stationName">Station Name:</label>
			<input type="text" name="stationName" id="stationName" class="form-control">
		</div>

		<div class="form-group">
			<label for="stationPass">Station Password:</label>
			<input type="text" name="stationPass" id="stationPass" class="form-control">
		</div>
		
		<div class="form-group">
			<label for="searchMap">Search for the Location:</label>
			<input type="text" id="searchMap" class="form-control">
		</div>

		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
				<label for="lat">lattitude:</label>
				<input type="text" id="lat" class="form-control" readonly>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label for="lng">longtitude:</label>
					<input type="text" id="lng" class="form-control" readonly>
				</div>
			</div>
		</div>	
	</form>

	<label for="map">Enter Station's Location Manualy:</label>
	<div id="map"></div>
	<script>
		var initMap = function(){
			var map = new google.maps.Map(document.querySelector('#map'), {
				center: { lat: 38.24, lng: 21.73},
				zoom: 10
			});

			var marker = new google.maps.Marker({
			position: { lat:38.24, lng: 21.73},
			map:map,
			draggable: true
			});

			var input = document.getElementById('searchMap');
			var autocomplete = new google.maps.places.Autocomplete(input);

			autocomplete.addListener('place_changed', function() {
				var place = autocomplete.getPlace();
				if (place.geometry.viewport){
					map.fitBounds(place.geometry.viewport);
				}
				else
				{
					map.setCenter(place.geometry.location);
      				map.setZoom(15);
				}
				//-----------------------------------------
				marker.setPosition(place.geometry.location);
				marker.setVisible(true);
			});

			marker.addListener('position_changed', function(){
				var lat = marker.getPosition().lat();
				var lng = marker.getPosition().lng();
				$('#lat').val(lat);
				$('#lng').val(lng);
			});

		};
	</script>

@stop

@section('gmap')
@stop