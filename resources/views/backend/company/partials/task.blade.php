
<div class="tab-pane fade" id="company-tasks">
  <div class="tile user-settings">
   <a href="{{ URL::to('crm/task/createcompanytask', $data->id) }}" type="button" class="btn btn-info btn-sm pull-right">{{ __('backend.addnew') }}</a>

   <h4 class="line-head">{{ __('backend.tasks') }}</h4>



   <table class="table table-hover table-bordered" id="noteTable">
    <thead>
      <tr>
        <th>{{ __('backend.details') }}</th>
        <th>{{ __('backend.date') }}</th>
        <th>{{ __('backend.edit') }}</th>
        <th>{{ __('backend.delete') }}</th>
      </tr>
    </thead>
    <tbody>
     @foreach($tasks as $task)
     <tr>
      <td width="60%">{!!  substr(strip_tags($task->details), 0, 50) !!}</td>
      <td width="20%">{{ $task->created_at }}</td>
      <td width="10%"><a href="{{ route('task.edit', $task->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>{{ __('backend.edit') }}</a> </td>
      <td width="10%">
 <a href="javascript:;" data-toggle="modal" onclick="deleteTask({{$task->id}})" data-target="#DeleteTaskModal" class="btn btn-xs btn-danger btn-sm"><i class="fa fa-trash"></i> {{ __('backend.delete') }}</a>
</td>
      
    </tr>
    @endforeach
  </tbody>
</table>

</div>
</div>

<div id="DeleteTaskModal" class="modal fade text-danger" role="dialog">
     <div class="modal-dialog" role="document">
       <!-- Modal content-->
       <form action="" id="deleteTaskForm" method="post">
         <div class="modal-content">
           <div class="modal-header">
             <h5 class="modal-title">{{ __('backend.deleteconfirmation') }}</h5>
             <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
           </div>
           <div class="modal-body">
             {{ csrf_field() }}
             {{ method_field('DELETE') }}
             <p class="text-center"><b>{{ __('backend.areusure') }}</b></p>
           </div>
           <div class="modal-footer">
             <center>
               <button type="button" class="btn btn-success" data-dismiss="modal">{{ __('backend.cancel') }}</button>
               <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formTaskSubmit()">{{ __('backend.yesdelete') }}</button>
             </center>
           </div>
         </div>
       </form>
     </div>
   </div>


  <script type="text/javascript">
     function deleteTask(id)
     {
       var id = id;
       var url = '{{ route("task.destroy", ":id") }}';
       url = url.replace(':id', id);
       $("#deleteTaskForm").attr('action', url);
     }

     function formTaskSubmit()
     {
       $("#deleteTaskForm").submit();
     }
   </script>