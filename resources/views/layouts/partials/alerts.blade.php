<!--Info alert -->
@if(Session::has('info'))
	<div class="alert alert-info alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{{Session::get('info')}}
	</div>
@endif

<!--False alert-->
@if(Session::has('alert'))
	<div class="alert alert-danger alert-dismissible" role="alert">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{{Session::get('alert')}}
	</div>
@endif

<!-- True Alert-->
@if(Session::has('success'))
	<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
		{{Session::get('success')}}
	</div>
@endif