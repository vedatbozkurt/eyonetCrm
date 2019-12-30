
<div class="tab-pane fade" id="company-contacts">
  <div class="tile user-settings">
   <a href="{{ URL::to('crm/contact/createcompanycontact', $data->id) }}" type="button" class="btn btn-info btn-sm pull-right">{{ __('backend.addnew') }}</a>

   <h4 class="line-head">{{ __('backend.contacts') }}</h4>



   <table class="table table-hover table-bordered" id="contactTable">
    <thead>
      <tr>
        <th>{{ __('backend.name') }}</th>
        <th>{{ __('backend.phone') }}</th>
        <th>{{ __('backend.email') }}</th>
        <th>{{ __('backend.position') }}</th>
        <th>{{ __('backend.edit') }}</th>
        <th>{{ __('backend.delete') }}</th>
      </tr>
    </thead>
    <tbody>
     @foreach($contacts as $contact)
     <tr>
      <td width="20%">{{ $contact->name }}</td>
      <td width="20%">{{ $contact->phone }}</td>
      <td width="20%">{{ $contact->email }}</td>
      <td width="20%">{{ $contact->position }}</td>
      <td width="10%"><a href="{{ route('contact.edit', $contact->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i>{{ __('backend.edit') }}</a> </td>
      <td width="10%">
        <a href="javascript:;" data-toggle="modal" onclick="deleteContact({{ $contact->id }})" data-target="#DeleteContactModal" class="btn btn-xs btn-danger btn-sm"><i class="fa fa-trash"></i> {{ __('backend.delete') }}</a>
     </td>
   </tr>
   @endforeach
 </tbody>
</table>

</div>
</div>


<div id="DeleteContactModal" class="modal fade text-danger" role="dialog">
 <div class="modal-dialog" role="document">
   <!-- Modal content-->
   <form action="" id="deleteContactForm" method="post">
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
           <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formContactSubmit()">{{ __('backend.yesdelete') }}</button>
         </center>
       </div>
     </div>
   </form>
 </div>
</div>


<script type="text/javascript">
 function deleteContact(id)
 {
   var id = id;
   var url = '{{ route("contact.destroy", ":id") }}';
   url = url.replace(':id', id);
   $("#deleteContactForm").attr('action', url);
 }

 function formContactSubmit()
 {
   $("#deleteContactForm").submit();
 }
</script>