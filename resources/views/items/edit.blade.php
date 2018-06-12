@extends('master')
@section('css')
	<link href="{{ asset('css/dataTables.bootstrap4.css') }}" rel="stylesheet">
	<link href="{{ asset('css/responsive.bootstrap4.css') }}" rel="stylesheet">
@endsection
@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
	<li class="breadcrumb-item"><a href="{{URL::to('items')}}">Items</a></li>
	<li class="breadcrumb-item active">Edit Items</li>

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
		<div class="row">
			<div class="col-12 col-sm-8">
				<div class="card">
					{{ Form::open(array('url' => 'items/' . $item->id)) }}
					{{ method_field('PATCH') }}
					<input type="hidden" name="redirectTo" value="{{ url()->previous() }}">
					<div class="card-header">
						<strong>Edit Item</strong>
						<small>Form</small>
					</div>
					<div class="card-body">
						<div class="form-group">
							{{ Form::label('name', 'Name') }}
							{{ Form::text('name', $item->name, array('class' => 'form-control','placeholder'=>'Name','required')) }}
						</div>
						<div class="form-group">
							{{ Form::label('quantity', 'Quantity') }}
							<div class="input-group">
								<div class="input-group-prepend">
									<button class="btn btn-danger" type="button" id="quantity-minus"><i class="fa fa-minus"></i></button>
								</div>
								<input type="number" id="quantity" name="quantity" class="form-control" placeholder="Quantity" aria-label="" value="{{$item->quantity}}" required>
								<div class="input-group-append">
									<button class="btn btn-success" type="button" id="quantity-plus"><i class="fa fa-plus" aria-hidden="true"></i></button>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-form-label" for="storage">Storage</label>
							<select class="form-control" id="storage" name="storage">
								@foreach ($storages as $value)
									<option value="{{$value->id}}" {{ $item->storage->name === $value->name ? "selected" : ""}}>{{$value->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="categories">Category</label>
							<select class="form-control" id="categories" name="categories[]">

								@foreach ($categories as $value)
									<option value="{{$value->id}}" {{ in_array($value->name,$item->categories->pluck('name')->all()) ? "selected" : ""}}>{{$value->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Save</button>
						<button type="reset" class="btn btn-default">Reset</button>
						<button type="button" onclick="window.location.href='{{ url()->previous() }}'" class="btn btn-small btn-info">Back</button>
					</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('myscript')
	<script src="{{ asset('js/views/items/edit.js') }}"></script>
@endsection