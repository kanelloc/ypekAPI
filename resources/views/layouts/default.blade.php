<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Project 2016</title>

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <style>
        #map {
        height: 300px;
        width: 100%;
    </style>

</head>
<body>
    @if(!Auth::check())
        @include('layouts.partials.navigation')
        <div class="container">
            @include('layouts.partials.alerts')
            @yield('content')
        </div>
    @elseif(Auth::check() && Auth::user()->admin)
        @include('layouts.partials.navigationAdmin')
        <div id="wrapper">
            <div class="page-wrapper">
                <div class="container">
                    @include('layouts.partials.alerts')
                    @yield('content')
                </div>
            </div>
        </div>
    @elseif(Auth::check() && !Auth::user()->admin)
        @include('layouts.partials.navigation')
        <div class="container">
            @include('layouts.partials.alerts')
            @yield('content')
        </div>
    @endif
    @yield('gmap')
	<!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk5WUI1INIP_8LV7kmAfhoLO4SWI2vZ-s&callback=initMap&libraries=places"
    async defer></script>
</body>
</html>