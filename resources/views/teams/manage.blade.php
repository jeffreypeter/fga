@extends('master')
@section('css')
	<link href="{{ asset('css/dataTables.bootstrap4.css') }}" rel="stylesheet">
	<link href="{{ asset('css/responsive.bootstrap4.css') }}" rel="stylesheet">
@endsection
@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item">Home</li>
	<li class="breadcrumb-item"><a href="#">Admin</a></li>
	<li class="breadcrumb-item active">Dashboard</li>

	<!-- Breadcrumb Menu-->
	<li class="breadcrumb-menu d-md-down-none">
		<div class="btn-group" role="group" aria-label="Button group">
			<a class="btn" href="#"><i class="icon-speech"></i></a>
			<a class="btn" href="./"><i class="icon-graph"></i> &nbsp;Admin</a>
			<a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Teams</a>
		</div>
	</li>
</ol>

<div class="container-fluid">
	<div class="animate fadeIn">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<strong>Manage Team</strong>
					</div>
					<div class="card-body">
						<a href="{{ URL::to('teams/create') }}" class="btn btn-primary">Add Team</a>
						<div class="shell">
							<table id="manage-teams" class="display responsive" width="100%">
								<thead>
								<tr>
									{{--<th>Id</th>--}}
									<th>Code</th>
									<th>Name</th>
									<th>Description</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
								@foreach($teams as $key => $value)
									<td><a href="{{ URL::to('teams/' . $value->id) }}">{{ $value->name }}</a></td>
									<td>{{ $value->email }}</td>
									<td>
										{{ Form::open(array('url' => 'teams/' . $value->id, 'class'=>'pull-left')) }}
										{{ Form::hidden('_method', 'DELETE') }}
										<button type="submit" class="btn btn-small btn-danger">
											<i class="fa fa-trash" aria-hidden="true"></i>
										</button>
										{{ Form::close() }}
									</td>
								@endforeach
								</tbody>
							</table>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
@endsection
@section('myscript')
	<script src="{{ asset('js/vendor/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('js/vendor/dataTables.responsive.js') }}"></script>
	<script src="{{ asset('js/vendor/dataTables.bootstrap4.js') }}"></script>
	<script src="{{ asset('js/vendor/responsive.bootstrap4.js') }}"></script>
	<script src="{{ asset('js/views/teams/manage.js') }}"></script>
@endsection