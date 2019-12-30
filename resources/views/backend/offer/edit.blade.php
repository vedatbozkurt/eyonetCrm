@extends('backend/layout/master')

@push('css')
@endpush

@section('title', trans('backend.editoffer'))
@section('contentTitle', trans('backend.editoffer'))
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



<form class="form-horizontal" method="post" action="{{ route('offer.update', $data->id) }}">
     @csrf
     @method('PATCH')
    <div class="tile-body">

 

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
               <textarea class="form-control" rows="3" name="details">{{ $data->details }}</textarea>
            </div>
        </div>

              <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.status') }}</label>
            <div class="col-md-8">
                <div class="form-group">
                    <select class="form-control" name="status" id="exampleSelect1">
                        <option value="0">{{ __('backend.sent') }}</option>
                        <option value="1" @if ($data->status == 1) {
                            selected
                        }  @endif>{{ __('backend.accepted') }}</option>
                        <option value="2" @if ($data->status == 2) {
                            selected
                        }  @endif>{{ __('backend.cancelled') }}</option>
                        <option value="3" @if ($data->status == 3) {
                            selected
                        }  @endif>{{ __('backend.denied') }}</option>
                    </select>
                </div>
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