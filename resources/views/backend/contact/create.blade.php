@extends('backend/layout/master')

@push('css')
@endpush

@section('title', trans('backend.addcontact'))
@section('contentTitle', trans('backend.addcontact'))

<!-- contentTitle sectionı eklenmezse default deger gösterilir -->
@section('content')
<!-- icerik -->
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



<form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ route('contact.store') }}">
     @csrf
    <div class="tile-body">

 <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.company') }}</label>
            <div class="col-md-8">
                <select class="form-control" id="exampleSelect2" name="company_id">
                    @foreach ($companies as $company)
                    <option value="{{$company->id}}" 
                        >
                        {{$company->name}} </option>
                    @endforeach
                </select>           </div>
            </div>

        <div class="form-group row">
                  <label class="control-label col-md-3">{{ __('backend.image') }}</label>
                  <div class="col-md-8">
                    <input class="form-control" name="image" type="file">
                  </div>
                </div>

        <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.name') }}</label>
            <div class="col-md-8">
                <input class="form-control" type="text" name="name" placeholder="{{ __('backend.entername') }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.email') }}</label>
            <div class="col-md-8">
                <input class="form-control" type="text" name="email" placeholder="{{ __('backend.enteremail') }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.phone') }}</label>
            <div class="col-md-8">
                <input class="form-control" type="text" name="phone" placeholder="{{ __('backend.enterphone') }}"  required>
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.position') }} </label>
            <div class="col-md-8">
                <input class="form-control" type="text" name="position" placeholder="{{ __('backend.enterposition') }}" required>
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