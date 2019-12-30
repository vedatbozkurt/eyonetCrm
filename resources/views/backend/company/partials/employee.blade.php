
			<div class="tab-pane fade" id="company-employee">
				<div class="tile">
					<h4 class="line-head">{{ __('backend.assignemployee') }}</h4>


<form class="form-horizontal" method="post" action="{{ route('company.updatecompanyemployee', $data->id) }}">
	@csrf
					 <select style="width: 100%" class="form-control" id="employeeSelect" multiple="" name="employees[]">
					@foreach ($employees as $employee)
					<option value="{{$employee->id}}" 
						@foreach($data->employees as $employeecompany)
						@if($employeecompany->id == $employee->id) selected @endif
						@endforeach>
						{{$employee->name}} </option>
					@endforeach
				</select>

	<div class="tile-footer">
		<div class="row">
			<div class="col-md-12 col-md-offset-3  text-center">
				<button class="btn btn-warning " type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{ __('backend.update') }}</button>&nbsp;&nbsp;&nbsp;
			</div>
		</div>
	</div>

</form>


				</div>
			</div>