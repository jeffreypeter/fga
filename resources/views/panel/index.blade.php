@extends('master')
@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
	<li class="breadcrumb-item active">Dashboard</li>

	<!-- Breadcrumb Menu-->
	<li class="breadcrumb-menu d-md-down-none">
		<div class="btn-group" role="group" aria-label="Button group">
			<a class="btn" href="#"><i class="icon-speech"></i></a>
			<a class="btn" href="./"><i class="icon-graph"></i> &nbsp;Dashboard</a>
			<a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Settings</a>
		</div>
	</li>
</ol>

<div class="container-fluid">
	<div class="animate fadeIn">
		<div class="row">
			<div class="col-sm-6 col-lg-3">
				<div class="card text-white bg-primary">
					<div class="card-body pb-0">
						<div class="btn-group float-right">
							<button type="button" class="btn btn-transparent dropdown-toggle p-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="icon-settings"></i>
							</button>
							<div class="dropdown-menu dropdown-menu-right">
								<a class="dropdown-item" href="/users">Users</a>
								{{--<a class="dropdown-item" href="#">Another action</a>
								<a class="dropdown-item" href="#">Something else here</a>--}}
							</div>
						</div>
						<h4 class="mb-0"> {{$users}}</h4>
						<p>Users</p>
					</div>
					<div class="chart-wrapper px-3" style="height:70px;">
						<canvas id="card-chart1" class="chart" height="70"></canvas>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection