@extends('master')
@section('css')
	<link href="{{ asset('css/dataTables.bootstrap4.css') }}" rel="stylesheet">
	<link href="{{ asset('css/responsive.bootstrap4.css') }}" rel="stylesheet">
@endsection
@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
	<li class="breadcrumb-item"><a href="{{URL::to('items')}}">Items</a></li>
	<li class="breadcrumb-item active">Create Items</li>

	<!-- Breadcrumb Menu-->
	{{--<li class="breadcrumb-menu d-md-down-none">
		<div class="btn-group" role="group" aria-label="Button group">
			<a class="btn" href="#"><i class="icon-speech"></i></a>
			<a class="btn" href="./"><i class="icon-graph"></i> &nbsp;Admin</a>
			<a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Template</a>
		</div>
	</li>--}}
</ol>

<div class="container-fluid">
	<div class="animate fadeIn">

		<div class="row">
			<div class="col-12 col-sm-8">
				<div class="card">
					{{ Form::open(array('url' => 'items','method' => 'post')) }}
					<input type="hidden" name="redirectTo" value="{{ url()->previous() }}">
					<div class="card-header">
						<strong>Create Items</strong>
						<small>Form</small>
					</div>
					<div class="card-body">
						<div class="form-group">
							{{ Form::label('name', 'Name') }}
							{{ Form::text('name', Input::old('name'), array('class' => 'form-control','placeholder'=>'Name','required')) }}
						</div>
						<div class="form-group">
							{{ Form::label('quantity', 'Quantity') }}
							{{ Form::number('quantity', Input::old('quantity'), array('class' => 'form-control','placeholder'=>'Quantity','required')) }}
						</div>
						<div class="form-group">
							<label class="col-form-label" for="storage">Storage</label>
							<select class="form-control" id="storage" name="storage">
								@foreach ($storages as $value)
									<option value="{{$value->id}}">{{$value->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="categories">Category</label>
							<select class="form-control" id="categories" name="categories[]">
								@foreach ($categories as $value)
									<option value="{{$value->id}}">{{$value->name}}</option>
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
@endsection