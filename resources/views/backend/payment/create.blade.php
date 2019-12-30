@extends('backend/layout/master')

@push('css')
@endpush

@section('title', trans('backend.addpayment'))
@section('contentTitle', trans('backend.addpayment'))
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



<form class="form-horizontal" method="post" action="{{ route('payment.store') }}">
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
            <label class="control-label col-md-3">{{ __('backend.service') }}</label>
            <div class="col-md-8">
                <select class="form-control" id="exampleSelect2" name="service_id">
                    @foreach ($services as $service)
                    <option value="{{$service->id}}" 
                        >
                        {{$service->name}} </option>
                    @endforeach
                </select>           </div>
            </div>
   
  <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.name') }}</label>
            <div class="col-md-8">
                <input class="form-control" type="text" name="name"  placeholder="{{ __('backend.entername') }}">
            </div>
        </div>

  <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.paymentmethod') }}</label>
            <div class="col-md-8">
                <input class="form-control" type="text" name="payment_method"  placeholder="{{ __('backend.enterpaymentmethod') }}">
            </div>
        </div>

          <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.paidprice') }}</label>
            <div class="col-md-8">
                <input class="form-control" type="text" name="price"  placeholder="{{ __('backend.enterpaidprice') }}">
            </div>
        </div>


         <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.details') }}</label>
            <div class="col-md-8">
               <textarea class="form-control" rows="2" name="details" placeholder="{{ __('backend.enterdetails') }}"></textarea>
            </div>
        </div>
 
        <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.status') }}</label>
            <div class="col-md-8">
                <div class="form-group">
                    <select class="form-control" name="status" id="exampleSelect1">
                        <option value="0">{{ __('backend.pending') }}</option>
                        <option value="1">{{ __('backend.completed') }}</option>
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