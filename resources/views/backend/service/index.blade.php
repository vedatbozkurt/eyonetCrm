@extends('backend/layout/master')

@push('css')

@endpush

@section('title', trans('backend.servicelist'))



@section('contentTitle', trans('backend.servicelist'))
@section('content')
@if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
<a href="{{ URL::to('crm/service/create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>{{ __('backend.addnew') }}</a>
<table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th>{{ __('backend.name') }}</th>
                    <th>{{ __('backend.price') }}</th>
                    <th>{{ __('backend.status') }}</th>
                    <th>{{ __('backend.edit') }}</th>
                    <th>{{ __('backend.delete') }}</th>
                  </tr>
                </thead>
                <tbody>
                	@foreach($data as $row)
                  <tr>
                    <td width="45%">{{ $row->name }}</td>
                    <td width="15%">{{ $row->price }} <b>{{ $currency->symbol}}</b></td>
                    <td width="10%">@if($row->status == 1)
        <h4><span class="badge badge-success">{{ __('backend.active') }}</span></h4>
        @else
       <h4><span class="badge badge-dark">{{ __('backend.notactive') }}</span></h4>
        @endif</td>
                    <td width="10%">

    <a href="{{ route('service.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>{{ __('backend.edit') }}</a> </td>
    <td width="10%">
  <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$row->id}})" data-target="#DeleteModal" class="btn btn-xs btn-danger btn-sm"><i class="fa fa-trash"></i> {{ __('backend.delete') }}</a>
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
       var url = '{{ route("service.destroy", ":id") }}';
       url = url.replace(':id', id);
       $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
       $("#deleteForm").submit();
     }
   </script>
@endpush