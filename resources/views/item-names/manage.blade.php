@extends('master')
@section('css')
	<link href="{{ asset('css/dataTables.bootstrap4.css') }}" rel="stylesheet">
	<link href="{{ asset('css/responsive.bootstrap4.css') }}" rel="stylesheet">
@endsection
@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
	<li class="breadcrumb-item active">Item Names</li>

	<!-- Breadcrumb Menu-->
	{{--<li class="breadcrumb-menu d-md-down-none">
		<div class="btn-group" role="group" aria-label="Button group">
			<a class="btn" href="#"><i class="icon-speech"></i></a>
			<a class="btn" href="./"><i class="icon-graph"></i> &nbsp;Admin</a>
			<a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Templates</a>
		</div>
	</li>--}}
</ol>

<div class="container-fluid">
	<div class="animate fadeIn">
		@include('core.alert')
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header">
						<strong>Manage Item Names</strong>
					</div>
					<div class="card-body">
						<a href="{{ URL::to('item-names/create') }}" class="btn btn-primary">Add Item Name</a>
						<div class="shell">
							<table id="manage-item-names" class="display responsive" width="100%">
								<thead>
								<tr>
									<th>Name</th>
									<th>Category</th>
									<th>Description</th>
									<th>Action</th>
								</tr>
								</thead>
								<tbody>
								@foreach($itemNames as $key => $value)
									<tr>
										<td><a href="{{ URL::to('item-names/' . $value->id. '/edit') }}">{{ $value->name }}</a></td>
										<td>
											{{ $value->category->name }}
										</td>
										<td>
											{{$value->description}}
										</td>
										<td>
											<div class="btn-group actions" role="group" aria-label="actions">
												<button onclick="window.location.href='{{ URL::to('item-names/' . $value->id. '/edit') }}'" class="btn btn-info btn-secondary"><i class="fa fa-edit" aria-hidden="true"></i></button>
												{{ Form::open(array('url' => 'item-names/' . $value->id, 'class'=>'pull-left')) }}
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
<div class="modal fade" id="primaryModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-primary" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Modal title</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<p>One fine body…</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
@endsection
@section('myscript')
	<script src="{{ asset('js/vendor/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('js/vendor/dataTables.responsive.js') }}"></script>
	<script src="{{ asset('js/vendor/dataTables.bootstrap4.js') }}"></script>
	<script src="{{ asset('js/vendor/responsive.bootstrap4.js') }}"></script>
	<script src="{{ asset('js/views/item-names/manage.js') }}"></script>
@endsection