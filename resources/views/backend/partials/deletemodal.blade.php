<div id="DeleteModal" class="modal fade text-danger" role="dialog">
     <div class="modal-dialog" role="document">
       <!-- Modal content-->
       <form action="" id="deleteForm" method="post">
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
               <button type="submit" name="" class="btn btn-danger" data-dismiss="modal" onclick="formSubmit()">{{ __('backend.yesdelete') }}</button>
             </center>
           </div>
         </div>
       </form>
     </div>
   </div>