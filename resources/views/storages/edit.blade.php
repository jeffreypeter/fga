@extends('master')
@section('css')
	<link href="{{ asset('css/dataTables.bootstrap4.css') }}" rel="stylesheet">
	<link href="{{ asset('css/responsive.bootstrap4.css') }}" rel="stylesheet">
@endsection
@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
	<li class="breadcrumb-item"><a href="{{URL::to('storages')}}">Storages</a></li>
	<li class="breadcrumb-item active">Edit Storage</li>

	<!-- Breadcrumb Menu-->
	{{--<li class="breadcrumb-menu d-md-down-none">
		<div class="btn-group" role="group" aria-label="Button group">
			<a class="btn" href="#"><i class="icon-speech"></i></a>
			<a class="btn" href="./"><i class="icon-graph"></i> &nbsp;Admin</a>
			<a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Roles</a>
		</div>
	</li>--}}
</ol>

<div class="container-fluid">
	<div class="animate fadeIn">
		<div id="accordion">
			<div class="card">
				<div class="card-header" id="headingOne">
					<h5 class="mb-0">
						<button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
							<strong>{{$storage->name}} Items</strong>
							<small>Edit</small>
						</button>
					</h5>
				</div>
				<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
					<div class="card-body">
                        <button type="button" onclick="window.location.href='{{ URL::to('storages') }}'" class="btn btn-small btn-info"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                        <button type="button" onclick="window.location.href='{{ URL::to('items/create?storage='.$storage->id) }}'" class="btn btn-primary">Add Item</button>
                        <div class="shell">
                            <table id="manage-storage-items" class="display responsive" width="100%">
                                <thead>
								<tr>
									<th>Name</th>
									<th>Description</th>
									<th>Quantity</th>
									<th>Storage</th>
									<th>Action</th>
								</tr>
                                </thead>
                                <tbody>
                                @foreach($storage->items as $key => $value)
									<tr>
										<td><a href="{{ URL::to('items/' . $value->id. '/edit') }}">{{ $value->itemName->name }}</a></td>
										<td>{{ $value->description}}</td>
										<td>{{ $value->quantity }}</td>
										<td>{{ $value->storage->address }}</td>
										<td>
											<div class="btn-group actions" role="group" aria-label="actions">
												<button onclick="window.location.href='{{ URL::to('items/' . $value->id. '/edit') }}'" class="btn btn-info btn-secondary"><i class="fa fa-edit" aria-hidden="true"></i></button>
												{{ Form::open(array('url' => 'items/' . $value->id, 'class'=>'pull-left')) }}
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
			<div class="card">
				<div class="card-header" id="headingTwo">
					<h5 class="mb-0">
						<button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
							<strong>Storage Info</strong>
							<small>Edit</small>
						</button>
					</h5>
				</div>
				<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
					<div class="card-body">
						<div class="row">
							<div class="col-12 col-sm-8">
								<div class="card">
									{{ Form::open(array('url' => 'storages/' . $storage->id)) }}
									{{ method_field('PATCH') }}
									<div class="card-body">
										<div class="form-group">
											{{ Form::label('name', 'Name') }}
											{{ Form::text('name', $storage->name, array('class' => 'form-control','placeholder'=>'Name','required')) }}
										</div>
										<div class="form-group">
											{{ Form::label('address', 'Address') }}
											{{ Form::text('address', $storage->address, array('class' => 'form-control','placeholder'=>'Address','required')) }}
										</div>
									</div>
									<div class="card-footer">
										<button type="submit" class="btn btn-primary">Save</button>
										<button type="reset" class="btn btn-default">Reset</button>
										<button type="button" onclick="window.location.href='{{ URL::to('storages') }}'" class="btn btn-small btn-info">Back</button>
									</div>
									{{ Form::close() }}
								</div>
							</div>
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
    <script src="{{ asset('js/views/storages/edit.js') }}"></script>
@endsection