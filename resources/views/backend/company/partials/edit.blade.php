<div class="tab-pane active" id="company-info">
				<div class="tile user-settings">
					<h4 class="line-head">{{ __('backend.generalinfo') }}</h4>
					<form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ route('company.update', $data->id) }}">
						@csrf
						@method('PATCH')
						<div class="tile-body">
							<div class="form-group row">
								<label class="control-label col-md-3">{{ __('backend.image') }}</label>
								<div class="col-md-8">
									<img src="
									@if(empty($data->logo))
									{{ URL::to('/') }}/images/no-logo.png
									@else
									{{ URL::to('/') }}/images/company/{{ $data->logo }}
									@endif
									" width="150" height="100" class="img-thumbnail" />
									<input class="form-control" name="image" type="file">
									<input type="hidden" name="hidden_image" value="{{ $data->logo }}" />
								</div>
							</div>

							<div class="form-group row">
								<label class="control-label col-md-3">{{ __('backend.name') }}</label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="name" value="{{ $data->name }}" placeholder="{{ __('backend.entername') }}">
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-3">{{ __('backend.email') }}</label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="email" value="{{ $data->email }}"  placeholder="{{ __('backend.enteremail') }}">
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-3">{{ __('backend.phone') }}</label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="phone" value="{{ $data->phone }}"  placeholder="{{ __('backend.enterphone') }}">
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-3">{{ __('backend.address') }} </label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="address" value="{{ $data->address }}"  placeholder="{{ __('backend.enteraddress') }}">
								</div>
							</div>
							<div class="form-group row">
								<label class="control-label col-md-3">{{ __('backend.website') }} </label>
								<div class="col-md-8">
									<input class="form-control" type="text" name="website" value="{{ $data->website }}"  placeholder="{{ __('backend.enterwebsite') }}">
								</div>
							</div>

							<div class="form-group row">
								<label class="control-label col-md-3">{{ __('backend.status') }}</label>
								<div class="col-md-8">
									<div class="form-group">
										<select class="form-control" name="status" id="exampleSelect1">
											<option value="1">{{ __('backend.active') }}</option>
											<option value="0" @if ($data->status == 0) {
												selected
											}  @endif>{{ __('backend.notactive') }}</option>
										</select>
									</div>
								</div>
							</div>

						</div>
						<div class="tile-footer">
							<div class="row">
								<div class="col-md-8 col-md-offset-3">
									<button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>{{ __('backend.update') }}</button>&nbsp;&nbsp;&nbsp;
								</div>
							</div>
						</div>

					</form>
				</div>
			</div>