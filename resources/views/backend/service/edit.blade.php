@extends('backend/layout/master')

@push('css')
@endpush

@section('title', trans('backend.editservice'))
@section('contentTitle', trans('backend.editservice'))
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



<form class="form-horizontal" method="post" action="{{ route('service.update', $data->id) }}">
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
			<label class="control-label col-md-3">{{ __('backend.price') }}</label>
			<div class="col-md-8">
				<input class="form-control" type="text" name="price"  value="{{ $data->price }}">
			</div>
		</div>

		<div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.status') }}</label>
            <div class="col-md-8">
                <div class="form-group">
                    <select class="form-control" name="status" id="exampleSelect1">
                        <option value="1">{{ __('backend.active') }}</option>
                        <option value="0" @if ($data->status == 0) {
                            selected
                        }  @endif>{{ __('backend.notactive') }}</option>
                    </select>
                </div>
            </div>
        </div>

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