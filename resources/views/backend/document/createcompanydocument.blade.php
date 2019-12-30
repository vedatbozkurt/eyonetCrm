@extends('backend/layout/master')

@push('css')
@endpush

@section('title', trans('backend.adddocument'))
@section('contentTitle', trans('backend.adddocument'))

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



<form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ route('document.store') }}">
     @csrf
    <div class="tile-body">

 <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.company') }}</label>
            <div class="col-md-8">
                <select class="form-control" id="exampleSelect2" name="company_id">
                    @foreach ($companies as $company)
                    <option value="{{$company->id}}" 
                        @if($company->id == $company_id) selected @endif
                        >
                        {{$company->name}} </option>
                    @endforeach
                </select>           </div>
            </div>

        <div class="form-group row">
                  <label class="control-label col-md-3">{{ __('backend.file') }}</label>
                  <div class="col-md-8">
                    <input class="form-control" name="file" type="file">
                  </div>
                </div>

        <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.name') }}</label>
            <div class="col-md-8">
                <input class="form-control" type="text" name="name" placeholder="{{ __('backend.entername') }}" required>
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