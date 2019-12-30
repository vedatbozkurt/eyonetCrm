@extends('backend/layout/master')

@push('css')
{{-- employee multi select --}}
@endpush

@section('title', trans('backend.companydetails'))
@section('contentTitle', trans('backend.companydetails'))
@section('content')
<div class="row user">
	<div class="col-md-3">
		<div class="tile p-0">
			<ul class="nav flex-column nav-tabs user-tabs">
				<li class="nav-item"><a class="nav-link active" href="#company-info" data-toggle="tab">{{ __('backend.general') }}</a></li>
				<li class="nav-item"><a class="nav-link" href="#company-contacts" data-toggle="tab">{{ __('backend.contacts') }}</a></li>
				<li class="nav-item"><a class="nav-link" href="#company-documents" data-toggle="tab">{{ __('backend.documents') }}</a></li>
				<li class="nav-item"><a class="nav-link" href="#company-tasks" data-toggle="tab">{{ __('backend.tasks') }}</a></li>
				<li class="nav-item"><a class="nav-link" href="#company-offers" data-toggle="tab">{{ __('backend.offers') }}</a></li>
				<li class="nav-item"><a class="nav-link" href="#company-employee" data-toggle="tab">{{ __('backend.employee') }}</a></li>
				<li class="nav-item"><a class="nav-link" href="#company-service" data-toggle="tab">{{ __('backend.services') }}</a></li>
			</ul>
		</div>
	</div>
	<div class="col-md-9">
		<div class="tab-content">

			@include('backend.company.partials.edit')
			@include('backend.company.partials.contact')
			@include('backend.company.partials.document')
			@include('backend.company.partials.task')
			@include('backend.company.partials.offer')
			@include('backend.company.partials.employee')
			@include('backend.company.partials.service')
			
		</div>
	</div>
</div>


@endsection



@push('js')
<!-- Page specific javascripts -->
  <script type="text/javascript" src="{{ URL::asset('asset/backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('asset/backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#noteTable').DataTable();</script>
    <script type="text/javascript">$('#documentTable').DataTable();</script>
    <script type="text/javascript">$('#contactTable').DataTable();</script>
    <script type="text/javascript">$('#offerTable').DataTable();</script>

  {{-- employee multi select --}}
    <script type="text/javascript" src="{{ URL::asset('asset/backend/js/plugins/select2.min.js') }}"></script>
    <script>
    	$('#employeeSelect').select2();
    	$('#serviceSelect').select2();
    </script>

@endpush