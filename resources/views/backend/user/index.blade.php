@extends('backend/layout/master')

@push('css')
<!-- Page specific styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"  />
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@endpush

@section('title', trans('backend.userlist'))



@section('contentTitle', trans('backend.userlist'))
<!-- contentTitle sectionı eklenmezse default deger gösterilir -->
@section('content')
<!-- icerik -->
@if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
<a href="{{ URL::to('crm/user/create') }}" class="btn btn-success pull-right"><i class="fa fa-plus"></i>{{ __('backend.addnew') }}</a>
<table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                  <tr>
                    <th width="40%">{{ __('backend.name') }}</th>
                    <th width="40%">{{ __('backend.role') }}</th>
                    <th width="40%">{{ __('backend.status') }}</th>
                    <th width="10%">{{ __('backend.edit') }}</th>
                    <th width="10%">{{ __('backend.delete') }}</th>
                  </tr>
                </thead>
                <tbody>
                	@foreach($users as $user)
                  <tr>
                    <td>{{ $user->name }}</td>
                    <td width="10%">@if($user->role == 0)
        {{ __('backend.superadmin') }}
        @elseif($user->role == 1)
       {{ __('backend.admin') }}
       @else
       Not Found
        @endif</td>
                    <td width="10%">
                      <input data-id="{{$user->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="{{ __('backend.active') }}" data-off="{{ __('backend.notactive') }}" {{ $user->status ? 'checked' : '' }}>
                    </td>
                    <td>

    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>{{ __('backend.edit') }}</a> </td>
   <td>
  <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$user->id}})" data-target="#DeleteModal" class="btn btn-xs btn-danger btn-sm"><i class="fa fa-trash"></i> {{ __('backend.delete') }}</a>
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
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script type="text/javascript">
     function deleteData(id)
     {
       var id = id;
       var url = '{{ route("user.destroy", ":id") }}';
       url = url.replace(':id', id);
       $("#deleteForm").attr('action', url);
     }

     function formSubmit()
     {
       $("#deleteForm").submit();
     }
   </script>
   <script>
  $(function() {
    $('.toggle-class').change(function() {
        var status = $(this).prop('checked') == true ? 1 : 0; 
        var user_id = $(this).data('id'); 
         
        $.ajax({
            type: "GET",
            dataType: "json",
            url: '/crm/changeStatus',
            data: {'status': status, 'user_id': user_id},
            success: function(data){
              console.log(data.success)
            }
        });
    })
  })
</script>
@endpush