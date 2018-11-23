@extends('master')
@section('css')
	<link href="{{ asset('css/dataTables.bootstrap4.css') }}" rel="stylesheet">
	<link href="{{ asset('css/responsive.bootstrap4.css') }}" rel="stylesheet">
	<link href="{{ asset('css/fastselect.css') }}" rel="stylesheet">
@endsection
@section('content')
<ol class="breadcrumb">
	<li class="breadcrumb-item"><a href="{{URL::to('/')}}">Home</a></li>
	<li class="breadcrumb-item"><a href="{{URL::to('users')}}">Users</a></li>
	<li class="breadcrumb-item active">Create User</li>

	<!-- Breadcrumb Menu-->
	{{--<li class="breadcrumb-menu d-md-down-none">
		<div class="btn-group" role="group" aria-label="Button group">
			<a class="btn" href="#"><i class="icon-speech"></i></a>
			<a class="btn" href="./"><i class="icon-graph"></i> &nbsp;Admin</a>
			<a class="btn" href="#"><i class="icon-settings"></i> &nbsp;Users</a>
		</div>
	</li>--}}
</ol>

<div class="container-fluid">
	<div class="animate fadeIn">

		<div class="row">
			<div class="col-12 col-sm-8">
				<div class="card">
					{{ Form::open(array('url' => 'users')) }}
					<div class="card-header">
						<strong>Create User</strong>
						<small>Form</small>
					</div>
					<div class="card-body">
						<div class="form-group">
							{{ Form::label('name', 'Name') }}
							{{ Form::text('name', Input::old('name'), array('class' => 'form-control','placeholder'=>'Name','required')) }}
						</div>
						<div class="form-group">
							{{ Form::label('email', 'Email') }}
							{{ Form::text('email', Input::old('email'), array('class' => 'form-control','placeholder'=>'Email','required')) }}
						</div>
						<div class="form-group">
							{{ Form::label('password', 'Password') }}
							{{ Form::text('password', Input::old('password'), array('class' => 'form-control','placeholder'=>'Password')) }}
						</div>
						<div class="form-group">
							<label class="col-form-label">Roles</label>
							@foreach ($roles as $item)
								<div class="form-check">
									<input class="form-check-input" type="checkbox" name="roles[]" id="{{$item->name}}" value="{{$item->name}}">
									<label class="form-check-label" for="{{$item->name}}">{{$item->display_name}}</label>
								</div>
							@endforeach
						</div>
						{{--<div class="form-group">
							<select class="multipleSelect" multiple name="language">
								<option value="Bangladesh">Bangladesh</option>
								<option selected value="Barbados">Barbados</option>
								<option selected value="Belarus">Belarus</option>
								<option value="Belgium">Belgium</option>
							</select>
						</div>--}}
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
	<script src="{{ asset('js/vendor/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('js/vendor/dataTables.responsive.js') }}"></script>
	<script src="{{ asset('js/vendor/dataTables.bootstrap4.js') }}"></script>
	<script src="{{ asset('js/vendor/responsive.bootstrap4.js') }}"></script>
	<script src="{{ asset('js/vendor/fastselect.standalone.js') }}"></script>
	<script src="{{ asset('js/views/users/manage.js') }}"></script>
@endsection