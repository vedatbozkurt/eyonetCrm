@extends('backend/layout/master')

@push('css')
@endpush

@section('title', trans('backend.addemployee'))
@section('contentTitle', trans('backend.addemployee'))
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



<form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ route('employee.store') }}">
     @csrf
    <div class="tile-body">
        <div class="form-group row">
                  <label class="control-label col-md-3">{{ __('backend.image') }}</label>
                  <div class="col-md-8">
                    <input class="form-control" name="image" type="file">
                  </div>
                </div>
                
        <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.name') }}</label>
            <div class="col-md-8">
                <input class="form-control" type="text" name="name"  placeholder="{{ __('backend.entername') }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.email') }}</label>
            <div class="col-md-8">
                <input class="form-control" type="text" name="email"  placeholder="{{ __('backend.enteremail') }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.password') }}</label>
            <div class="col-md-8">
                <input class="form-control" type="password" name="password"  placeholder="{{ __('backend.enterpassword') }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.position') }} </label>
            <div class="col-md-8">
                <input class="form-control" type="text" name="position"  placeholder="{{ __('backend.enterposition') }}">
            </div>
        </div>

        <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.status') }}</label>
            <div class="col-md-8">
                <div class="form-group">
                    <select class="form-control" name="status" id="exampleSelect1">
                        <option value="1">{{ __('backend.active') }}</option>
                        <option value="0">{{ __('backend.notactive') }}</option>
                    </select>
                </div>
            </div>
        </div>
                <input class="form-control" type="hidden" name="user_id"  value="{{ Auth::id() }}">

    </div>
    <div class="tile-footer">
        <div class="row">
            <div class="col-md-8 col-md-offset-3">
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{ __('backend.save') }}</button>&nbsp;&nbsp;&nbsp;
            </div>
        </div>
    </div>

</form>
@endsection



@push('js')
@endpush