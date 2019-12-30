@extends('backend/layout/master')

@push('css')
@endpush

@section('title', trans('backend.tasklist'))

@section('contentTitle', trans('backend.tasklist'))
@section('content')
<!-- icerik -->
@if(session()->get('success'))
<div class="alert alert-success">
  {{ session()->get('success') }}  
</div><br />
@endif
<a href="{{ URL::to('crm/task/create') }}" class="btn btn-success pull-right" style="margin-left: 20px;"><i class="fa fa-plus"></i>{{ __('backend.addnew') }}</a>
<table class="table table-hover table-bordered" id="sampleTable">
  <thead>
    <tr>
      <th>{{ __('backend.company') }}</th>
      <th>{{ __('backend.details') }}</th>

      <th>{{ __('backend.edit') }}</th>
      <th>{{ __('backend.delete') }}</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $row)
    <tr>
      <td width="30%"><a href="{{ route('company.show', $row->company_id) }}">{{ $row->company->name }}</a></td>
      <td width="50%">{!!  substr(strip_tags($row->details), 0, 50) !!}</td>
      <td width="10%">

        <a href="{{ route('task.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>{{ __('backend.edit') }}</a> </td>
        <td width="10%">
          <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$row->id}})" 
            data-target="#DeleteModal" class="btn btn-xs btn-danger btn-sm"><i class="fa fa-trash"></i> {{ __('backend.delete') }}</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    @include('backend.partials.deletemodal')


    @endsection



    @push('js')
<!-- Page specific javascripts -->
    <script type="text/javascript" src="{{ URL::asset('asset/backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('asset/backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>

    <script type="text/javascript">
     function deleteData(id)
     {
       var id = id;
       var url = '{{ route("task.destroy", ":id") }}';
       url = url.replace(':id', id);
       $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
       $("#deleteForm").submit();
     }
   </script>
   @endpush