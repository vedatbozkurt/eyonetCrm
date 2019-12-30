@extends('backend/layout/master')

@push('css')
@endpush

@section('title', trans('backend.paymentlist'))



@section('contentTitle', trans('backend.paymentlist'))
<!-- contentTitle sectionı eklenmezse default deger gösterilir -->
@section('content')
<!-- icerik -->
@if(session()->get('success'))
<div class="alert alert-success">
  {{ session()->get('success') }}  
</div><br />
@endif
<a href="{{ URL::to('crm/payment/create') }}" class="btn btn-success pull-right" style="margin-left: 20px;"><i class="fa fa-plus"></i>{{ __('backend.addnew') }}</a>
<table class="table table-hover table-bordered" id="sampleTable">
  <thead>
    <tr>
      <th>{{ __('backend.company') }}</th>
      <th>{{ __('backend.title') }}</th>
      <th>{{ __('backend.service') }}</th>
      <th>{{ __('backend.price') }}</th>
      <th>{{ __('backend.status') }}</th>

      <th>{{ __('backend.edit') }}</th>
      <th>{{ __('backend.delete') }}</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $row)
    <tr>
      <td width="20%"><a href="{{ route('company.show', $row->company_id) }}">{{ $row->company->name }}</a></td>
      <td width="20%">{{ $row->name }}</td>
      <td width="20%">{{ $row->service->name }}</td>
      <td width="20%">
      Paid Price: {{ $row->price }} <b>{{ $currency->symbol}}</b><br>
      Service Price: {{ $row->service->price }} <b>{{ $currency->symbol}}</b><br>
      Due: {{ ($row->service->price)-($row->price) }} <b>{{ $currency->symbol}}</b>

      </td>

       <td width="20%">
        @if($row->status == 1)
        <h4><span class="badge badge-success">{{ __('backend.competed') }}</span></h4>
        @else
       <h4><span class="badge badge-primary">{{ __('backend.pending') }}</span></h4>
        @endif
      </td>

      <td width="10%">

        <a href="{{ route('payment.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>{{ __('backend.edit') }}</a> </td>
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
       var url = '{{ route("payment.destroy", ":id") }}';
       url = url.replace(':id', id);
       $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
       $("#deleteForm").submit();
     }
   </script>
   @endpush