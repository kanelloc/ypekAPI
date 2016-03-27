<!--Info alert -->
@if(Session::has('info'))
	<div class="alert alert-info" role="alert">
		{{Session::get('info')}}
	</div>
@endif

<!--False alert-->
@if(Session::has('alert'))
	<div class="alert alert-danger" role="alert">
		{{Session::get('alert')}}
	</div>
@endif

<!-- True Alert-->
@if(Session::has('success'))
	<div class="alert alert-success">
		{{Session::get('success')}}
	</div>
@endif