@extends('backend/layout/master')

@push('css')
@endpush

@section('title', trans('backend.editevent'))
@section('contentTitle', trans('backend.editevent'))
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



<form class="form-horizontal" method="post" action="{{ route('event.update', $data->id) }}">
     @csrf
     @method('PATCH')
    <div class="tile-body">
  
       <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.company') }}</label>
            <div class="col-md-8">
                <input class="form-control" type="text" name="name" value="{{ $data->company->name }}" readonly>
            </div>
        </div>
	<div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.name') }}</label>
            <div class="col-md-8">
                <input class="form-control" type="text" name="name" value="{{ $data->name }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.color') }} <a href="https://www.google.com/search?q=color+picker" target="_blank">*</a> </label>
            <div class="col-md-8">
                <input class="form-control" type="text" name="color" value="{{ $data->color }}">
            </div>
        </div>

        <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.description') }}</label>
            <div class="col-md-8">
               <textarea class="form-control" rows="3" name="description">{{ $data->description }}</textarea>
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.startdate') }}</label>
            <div class="col-md-8">
                <input class="form-control" type="text" id="demoDate" name="start_date" value="{{ $data->start_date }}">
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.enddate') }}</label>
            <div class="col-md-8">
                <input class="form-control" type="text" id="demoDate2" name="end_date" value="{{ $data->end_date }}">
            </div>
        </div>
        
    </div>
    <div class="tile-footer">
        <div class="row">
            <div class="col-md-12 col-md-offset-3">
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{ __('backend.update') }}</button>&nbsp;&nbsp;&nbsp;
</form>
                <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$data->id}})" data-target="#DeleteModal" class="btn btn-xs btn-danger pull-right"><i class="fa fa-trash"></i> {{ __('backend.delete') }}</a>
            </div>

        </div>
    </div>



    @include('backend.partials.deletemodal')


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

      <script type="text/javascript">
     function deleteData(id)
     {
       var id = id;
       var url = '{{ route("event.destroy", ":id") }}';
       url = url.replace(':id', id);
       $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
       $("#deleteForm").submit();
     }
   </script>
@endpush