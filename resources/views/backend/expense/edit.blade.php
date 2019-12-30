@extends('backend/layout/master')

@push('css')
@endpush

@section('title', trans('backend.editexpense'))
@section('contentTitle', trans('backend.editexpense'))
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



<form class="form-horizontal" method="post" action="{{ route('expense.update', $data->id) }}">
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
                <input class="form-control" type="text" name="price" value="{{ $data->price }}">
            </div>
        </div>


         <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.details') }}</label>
            <div class="col-md-8">
               <textarea class="form-control" rows="2" name="details">{{ $data->details }}</textarea>
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