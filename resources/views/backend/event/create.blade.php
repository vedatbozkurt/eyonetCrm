@extends('backend/layout/master')

@push('css')
@endpush

@section('title', trans('backend.addevent'))
@section('contentTitle', trans('backend.addevent'))
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



<form class="form-horizontal" method="post" action="{{ route('event.store') }}">
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
            <label class="control-label col-md-3">{{ __('backend.name') }}</label>
            <div class="col-md-8">
                <input class="form-control" type="text" name="name"  placeholder="{{ __('backend.entername') }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.color') }} <a href="https://www.google.com/search?q=color+picker" target="_blank">*</a> </label>
            <div class="col-md-8">
                <input class="form-control" type="text" name="color"  placeholder="{{ __('backend.entercolor') }}">
            </div>
        </div>

        <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.description') }}</label>
            <div class="col-md-8">
               <textarea class="form-control" rows="3" name="description" placeholder="{{ __('backend.enterdescription') }}"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.startdate') }}</label>
            <div class="col-md-8">
                <input class="form-control" type="text" id="demoDate" name="start_date"  placeholder="{{ __('backend.enterstartdate') }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.enddate') }}</label>
            <div class="col-md-8">
                <input class="form-control" type="text" id="demoDate2" name="end_date"  placeholder="{{ __('backend.enterenddate') }}">
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
<!-- Page specific javascripts-->
<script type="text/javascript" src="{{ URL::asset('asset/backend/js/plugins/bootstrap-datepicker.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('asset/backend/js/plugins/bootstrap-datepicker.min.js') }}"></script>
 <script>
    $('#demoDate').datepicker({
        format: "yyyy/mm/dd",
        autoclose: true,
        todayHighlight: true
      });
    $('#demoDate2').datepicker({
        format: "yyyy/mm/dd",
        autoclose: true,
        todayHighlight: true
      });
      </script>
@endpush