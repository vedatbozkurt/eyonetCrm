@extends('backend/layout/master')

@push('css')
@endpush

@section('title', trans('backend.editcontact'))
@section('contentTitle', trans('backend.editcontact'))
@section('content')
{{-- {{ $data->description }} --}}
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif



<form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{ route('contact.update', $data->id) }}">
     @csrf
     @method('PATCH')
    <div class="tile-body">

<div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.company') }}</label>
            <div class="col-md-8">
                <select class="form-control" id="exampleSelect2" name="company_id">
                    @foreach ($companies as $company)
                    <option value="{{$company->id}}" 
                        @if($company->id == $data->company->id) selected @endif
                        >
                        {{$company->name}} </option>
                    @endforeach
                </select>           </div>
            </div>
            
        <div class="form-group row">
                  <label class="control-label col-md-3">{{ __('backend.image') }}</label>
                  <div class="col-md-8">
                    <img src="
@if(empty($data->image))
{{ URL::to('/') }}/images/no-image.png
@else
{{ URL::to('/') }}/images/contact/{{ $data->image }}
@endif
" width="150" height="100" class="img-thumbnail" />
                    <input class="form-control" name="image" type="file">
                    <input type="hidden" name="hidden_image" value="{{ $data->image }}" />
                  </div>
                </div>

        <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.name') }}</label>
            <div class="col-md-8">
                <input class="form-control" type="text" name="name" value="{{ $data->name }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.email') }}</label>
            <div class="col-md-8">
                <input class="form-control" type="text" name="email" value="{{ $data->email }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.phone') }}</label>
            <div class="col-md-8">
                <input class="form-control" type="text" name="phone" value="{{ $data->phone }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="control-label col-md-3">{{ __('backend.position') }} </label>
            <div class="col-md-8">
                <input class="form-control" type="text" name="position"  value="{{ $data->position }}" required>
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
@endsection



@push('js')
@endpush