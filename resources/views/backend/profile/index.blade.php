@extends('backend/layout/master')

@push('css')
@endpush

@section('title', trans('backend.editprofile'))

@section('contentTitle', trans('backend.editprofile'))
@section('content')
{{-- {{ $data->description }} --}}
@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif

@if(session()->get('success'))
<div class="alert alert-success">
	{{ session()->get('success') }}  
</div><br />
@endif
<form class="form-horizontal" method="post" action="{{ route('backend.profile') }}" enctype="multipart/form-data">
	@csrf
	@method('POST')
	<div class="tile-body">
		<div class="form-group row">
                  <label class="control-label col-md-3">{{ __('backend.image') }}</label>
                  <div class="col-md-8">
                  	<img src="
                  	@if(empty($data->image))
{{ URL::to('/') }}/images/no-image.png
@else
{{ URL::to('/') }}/images/profile/{{ $data->image }}
@endif
" width="150" height="150" class="img-thumbnail" />
                    <input class="form-control" name="image" type="file">
                    <input type="hidden" name="hidden_image" value="{{ $data->image }}" />
                  </div>
                </div>
		<div class="form-group row">
			<label class="control-label col-md-3">{{ __('backend.name') }}</label>
			<div class="col-md-8">
				<input class="form-control" type="text" name="name" value="{{ $data->name }}" placeholder="{{ __('backend.entername') }}">
			</div>
		</div>
		<div class="form-group row">
			<label class="control-label col-md-3">{{ __('backend.email') }}</label>
			<div class="col-md-8">
				<input class="form-control" type="text" name="email" value="{{ $data->email }}" placeholder="{{ __('backend.enteremail') }}">
			</div>
		</div>

		<div class="form-group row">
			<label class="control-label col-md-3">{{ __('backend.password') }}</label>
			<div class="col-md-8">
				<input class="form-control" type="password" name="password" value="" placeholder="{{ __('backend.enterpassword') }}">
			</div>
		</div>


	<div class="tile-footer">
		<div class="row">
			<div class="col-md-8 col-md-offset-3">
				<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{ __('backend.update') }}</button>&nbsp;&nbsp;&nbsp;
			</div>
		</div>
	</div>

</form>
@endsection



@push('js')
@endpush