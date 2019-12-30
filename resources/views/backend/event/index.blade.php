@extends('backend/layout/master')

@push('css')
@endpush

@section('title', trans('backend.eventcalendar'))

@section('contentTitle', trans('backend.eventcalendar'))

@section('content')
<!-- icerik -->
@if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <a href="{{ URL::to('crm/event/create') }}" class="btn btn-success pull-right" style="margin-left: 20px;"><i class="fa fa-plus"></i>{{ __('backend.addnew') }}</a>

              {!! $calendar->calendar() !!}

          
@endsection



@push('js')
<!-- Page specific javascripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
            {!! $calendar->script() !!}
  
@endpush