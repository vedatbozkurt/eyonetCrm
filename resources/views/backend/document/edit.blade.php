@extends('backend/layout/master')

@push('css')
@endpush

@section('title', trans('backend.editdocument'))
@section('contentTitle', trans('backend.editdocument'))
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



<form class="form-horizontal" method="post" action="{{ route('document.update', $data->id) }}">
     @csrf
     @method('PATCH')
    <div class="tile-body">



        <div class="form-group row">
                  <label class="control-label col-md-3">{{ __('backend.file') }}</label>
                  <div class="col-md-8">
                    <a href="{{ URL::to('/') }}/documents/{{ $data->company_id }}/{{ $data->filename }}">{{ $data->filename }}</a>
                  </div>
                </div>
<div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.company') }}</label>
            <div class="col-md-8">
                <select class="form-control" id="exampleSelect2" name="company_id">
                    @foreach ($companies as $company)
                    <option value="{{$company->id}}" 
                        @if($company->id == $data->company->id) selected @endif
                        >
                        {{$company->name}} </option>
                    @endforeach
                </select>           </div>
            </div>
        <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.name') }}</label>
            <div class="col-md-8">
                <input class="form-control" type="text" name="name" value="{{ $data->name }}" required>
            </div>
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