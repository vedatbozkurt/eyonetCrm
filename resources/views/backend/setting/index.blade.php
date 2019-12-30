@extends('backend/layout/master')

@push('css')
<!-- bu sayfya ozel css kodları -->
@endpush

@section('title', trans('backend.settings'))
@section('contentTitle', trans('backend.settings'))
@section('content')
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
<form class="form-horizontal" method="post" action="{{ route('backend.setting') }}" enctype="multipart/form-data">
	@csrf
	@method('POST')
	<div class="tile-body">
		<div class="form-group row">
			<label class="control-label col-md-3">{{ __('backend.logo') }}</label>
			<div class="col-md-8">
				<img src="
				@if(empty($data->logo))
				{{ URL::to('/') }}/images/no-logo.png
				@else
				{{ URL::to('/') }}/images/logo/{{ $data->logo }}
				@endif
				" width="300" height="150" class="img-thumbnail" />
				<input class="form-control" name="image" type="file">
				<input type="hidden" name="hidden_image" value="{{ $data->logo }}" />
			</div>
		</div>
		<div class="form-group row">
			<label class="control-label col-md-3">{{ __('backend.companyname') }}</label>
			<div class="col-md-8">
				<input class="form-control" type="text" name="company_name" value="{{ $data->company_name }}">
			</div>
		</div>
		<div class="form-group row">
			<label class="control-label col-md-3">{{ __('backend.domain') }}</label>
			<div class="col-md-8">
				<input class="form-control" type="text" name="domain" value="{{ $data->domain }}">
			</div>
		</div>

		<div class="form-group row">
			<label class="control-label col-md-3">{{ __('backend.address') }}</label>
			<div class="col-md-8">
				<input class="form-control" type="text" name="address" value="{{ $data->address }}">
			</div>
		</div>

		<div class="form-group row">
			<label class="control-label col-md-3">{{ __('backend.phone') }}</label>
			<div class="col-md-8">
				<input class="form-control" type="text" name="phone" value="{{ $data->phone }}">
			</div>
		</div>

		<div class="form-group row">
			<label class="control-label col-md-3">{{ __('backend.currency') }}</label>
			<div class="col-md-8">
				<select  class="form-control" name="currency_id"> 
					@foreach ($currencies as $currency)
					<option value="{{$currency->id}}" 
						@if($currency->id == $data->currency_id ) selected @endif
						>
						{{$currency->symbol}} ({{$currency->name}})</option>
						@endforeach
					</select>
			</div>
		</div>

		<input class="form-control" type="hidden" name="user_id"  value="{{ Auth::id() }}">

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