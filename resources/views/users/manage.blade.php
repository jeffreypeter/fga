@extends('master')
@section('css')
	<link href="{{ asset('css/dataTables.bootstrap4.css') }}" rel="stylesheet">
	<link href="{{ asset('css/responsive.bootstrap4.css') }}" rel="stylesheet">
@endsection
@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
	<li class="breadcrumb-item active">Users</li>

	<!-- Breadcrumb Menu-->
	<li class="breadcrumb-menu d-md-down-none">
		<div class="btn-group" role="group" aria-label="Button group">
			<a class="btn" href="#"><i class="icon-speech"></i></a>
			<a class="btn" href="./"><i class="icon-graph"></i> &nbsp;Admin</a>
			<a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Users</a>
		</div>
	</li>
</ol>

<div class="container-fluid">
	<div class="animate fadeIn">
		@include('core.alert')
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<strong>Manage Users</strong>
					</div>
					<div class="card-body">
						<a href="{{ URL::to('users/create') }}" class="btn btn-primary">Add User</a>
						<div class="shell">
							<table id="manage-users" class="display responsive" width="100%">
								<thead>
								<tr>
									{{--<th>Id</th>--}}
									<th>Name</th>
									<th>Email</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
								@foreach($users as $key => $value)
									<tr>
										<td><a href="{{ URL::to('users/' . $value->id) }}">{{ $value->name }}</a></td>
										<td>{{ $value->email }}</td>
										<td>
											<div class="btn-group" role="group" aria-label="Basic example">
												<button onclick="window.location.href='{{ URL::to('users/' . $value->id. '/edit') }}'" class="btn btn-info btn-secondary"><i class="fa fa-edit" aria-hidden="true"></i></button>
												{{ Form::open(array('url' => 'users/' . $value->id, 'class'=>'pull-left')) }}
												{{ Form::hidden('_method', 'DELETE') }}
												<button type="submit" class="btn btn-danger btn-secondary">
													<i class="fa fa-trash" aria-hidden="true"></i>
												</button>
												{{ Form::close() }}
											</div>
										</td>
									</tr>
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
	<script src="{{ asset('js/views/users/manage.js') }}"></script>
@endsection