@extends('master')
@section('css')
	<link href="{{ asset('css/dataTables.bootstrap4.css') }}" rel="stylesheet">
	<link href="{{ asset('css/responsive.bootstrap4.css') }}" rel="stylesheet">
@endsection
@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
	<li class="breadcrumb-item"><a href="{{URL::to('item-names')}}">Item Names</a></li>
	<li class="breadcrumb-item active">Edit</li>

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
					{{ Form::open(array('url' => 'item-names/' . $itemName->id)) }}
					{{ method_field('PATCH') }}
					<div class="card-header">
						<strong>Edit Item</strong>
						<small>Form</small>
					</div>
					<div class="card-body">
						<div class="form-group">
							{{ Form::label('name', 'Name') }}
							{{ Form::text('name', $itemName->name, array('class' => 'form-control','placeholder'=>'Name','required')) }}
						</div>
						<div class="form-group">
							{{ Form::label('description', 'Description') }}
							{{ Form::text('description', $itemName->description, array('class' => 'form-control','placeholder'=>'Description','required')) }}
						</div>
						<div class="form-group">
							<label for="category">Category</label>
							<select class="form-control" id="category" name="category">

								@foreach ($categories as $value)
									<option value="{{$value->id}}" {{ ($value->name === $itemName->category->name) ? "selected" : ""}} >{{$value->name}}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="card-footer">
						<button type="submit" class="btn btn-primary">Save</button>
						<button type="reset" class="btn btn-default">Reset</button>
						<button type="button" onclick="window.location.href='{{ URL::to('item-names') }}'" class="btn btn-small btn-info">Back</button>
					</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
@section('myscript')
@endsection