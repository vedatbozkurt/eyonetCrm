@extends('backend/layout/master')

@push('css')
@endpush

@section('title', trans('backend.editcurrency'))
@section('contentTitle', trans('backend.editcurrency'))
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



<form class="form-horizontal" method="post" action="{{ route('currency.update', $data->id) }}">
	 @csrf
     @method('PATCH')
	<div class="tile-body">
		<div class="form-group row">
			<label class="control-label col-md-3">{{ __('backend.name') }}</label>
			<div class="col-md-8">
				<input class="form-control" type="text" name="name" value="{{ $data->name }}">
			</div>
		</div>
		<div class="form-group row">
			<label class="control-label col-md-3">{{ __('backend.symbol') }}</label>
			<div class="col-md-8">
				<input class="form-control" type="text" name="symbol"  value="{{ $data->symbol }}">
			</div>
		</div>

                <input class="form-control" type="hidden" name="user_id"  value="{{ Auth::id() }}">

	</div>
	<div class="tile-footer">
		<div class="row">
			<div class="col-md-8 col-md-offset-3">
				<button class="btn btn-warning" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{ __('backend.update') }}</button>&nbsp;&nbsp;&nbsp;
			</div>
		</div>
	</div>

</form>
@endsection



@push('js')
@endpush