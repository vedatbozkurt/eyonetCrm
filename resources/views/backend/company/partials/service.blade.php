
			<div class="tab-pane fade" id="company-service">
				<div class="tile user-settings">
					<h4 class="line-head">{{ __('backend.assignservice') }}</h4>


<form class="form-horizontal" method="post" action="{{ route('company.updatecompanyservice', $data->id) }}">
	@csrf
					 <select style="width: 100%" class="form-control" id="serviceSelect" multiple="" name="services[]">
					@foreach ($services as $service)
					<option value="{{$service->id}}" 
						@foreach($data->services as $servicecompany)
						@if($servicecompany->id == $service->id) selected @endif
						@endforeach>
						{{$service->name}} </option>
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