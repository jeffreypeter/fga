@extends('master')
@section('css')
	<link href="{{ asset('css/dataTables.bootstrap4.css') }}" rel="stylesheet">
	<link href="{{ asset('css/responsive.bootstrap4.css') }}" rel="stylesheet">
@endsection
@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
	<li class="breadcrumb-item active">Roles</li>

	<!-- Breadcrumb Menu-->
	<li class="breadcrumb-menu d-md-down-none">
		<div class="btn-group" role="group" aria-label="Button group">
			<a class="btn" href="#"><i class="icon-speech"></i></a>
			<a class="btn" href="{{ URL::to('roles') }}"><i class="icon-graph"></i> &nbsp;Roles</a>
		</div>
	</li>
</ol>

<div class="container-fluid">
	<div class="animate fadeIn">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<strong>Manage Roles</strong>
					</div>
					<div class="card-body">
						<a href="{{ URL::to('roles/create') }}" class="btn btn-primary">Add Role</a>
						<div class="shell">
							<table id="manage-roles" class="display responsive" width="100%">
								<thead>
								<tr>
									{{--<th>Id</th>--}}
									<th data-priority="1">Name</th>
									<th>Description</th>
									<th data-priority="2">Action</th>
								</tr>
								</thead>
								<tbody>
								@foreach($roles as $key => $value)
									<tr>
										<td><a href="{{ URL::to('roles/' . $value->id. '/edit') }}">{{ $value->display_name }}</a></td>
										<td>{{ $value->description }}</td>
										<td>
											<div class="btn-group actions" role="group" aria-label="actions">
												<button onclick="window.location.href='{{ URL::to('roles/' . $value->id. '/edit') }}'" class="btn btn-secondary btn-info"><i class="fa fa-edit" aria-hidden="true"></i></button>
												{{ Form::open(array('url' => 'roles/' . $value->id, 'class'=>'pull-left')) }}
												{{ Form::hidden('_method', 'DELETE') }}
												<button type="submit" class="btn btn-secondary btn-danger">
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
	<script src="{{ asset('js/views/roles/manage.js') }}"></script>
@endsection