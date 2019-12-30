@extends('backend/layout/master')

@push('css')
<!-- Page specific styles -->
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
@endpush

@section('title', trans('backend.dashboard'))
@section('contentTitle', trans('backend.dashboard'))
@section('content')
<!-- icerik -->

<div class="row">
        <div class="col-md-3">
          <div class="widget-small primary"><i class="icon fa fa-briefcase fa-3x"></i>
            <div class="info">
              <h4>{{ __('backend.companies') }}</h4>
              <p><b>{{ $companies }}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="widget-small info"><i class="icon fa fa-address-card fa-3x"></i>
            <div class="info">
              <h4>{{ __('backend.contacts') }}</h4>
              <p><b>{{ $contacts }}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="widget-small warning"><i class="icon fa fa-bars fa-3x"></i>
            <div class="info">
              <h4>{{ __('backend.services') }}</h4>
              <p><b>{{ $services }}</b></p>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="widget-small danger"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>{{ __('backend.employees') }}</h4>
              <p><b>{{ $employees }}</b></p>
            </div>
          </div>
        </div>
</div>

      <div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">{{ __('backend.servicesprovided') }}</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">{{ __('backend.finance') }}</h3>
            <div class="embed-responsive embed-responsive-16by9">
              <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
            </div>
          </div>
        </div>
      </div>

<div class="row">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">{{ __('backend.eventlogs') }}</h3>
            <div class="table-responsive mailbox-messages">
              <table class="table table-hover">
                <tbody>
                  @foreach($events as $event)
                  <tr>
                    <td class="mail-subject"><b>{!!  substr(strip_tags($event->description), 0, 40) !!}</b></td>
                    <td><i class="fa fa-paperclip"></i></td>
                    <td>{{ Carbon\Carbon::parse($event->created_at)->diffForHumans()}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
         <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">{{ __('backend.tasklogs') }}</h3>
            <div class="table-responsive mailbox-messages">
              <table class="table table-hover">
                <tbody>
                  @foreach($tasks as $task)
                  <tr>
                    <td class="mail-subject"><b>{!!  substr(strip_tags($task->details), 0, 40) !!}</b></td>
                    <td><i class="fa fa-paperclip"></i></td>
                    <td>{{ Carbon\Carbon::parse($task->created_at)->diffForHumans()}}</td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>


@endsection



@push('js')
<!-- Page specific javascripts -->
<script type="text/javascript" src="{{ URL::asset('asset/backend/js/plugins/chart.js') }}"></script>
<script type="text/javascript">
      var data = {
      	labels: ["Jan", "Feb", "Mar", "Apr", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"],
      	datasets: [
      		
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [{{ $months[0] }}, {{ $months[1] }}, {{ $months[2] }}, {{ $months[3] }}, {{ $months[4] }}, {{ $months[5] }}, {{ $months[6] }}, {{ $months[7] }}, {{ $months[8] }}, {{ $months[9] }}, {{ $months[10] }}, {{ $months[11] }}]
      		}
      	]
      };
      var pdata = [
      	{
      		value: {{ $income }},
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "{{ __('backend.income') }} ({{ $currency->symbol}})"
      	},
      	{
      		value: {{ $expense }},
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "{{ __('backend.expense') }} ({{ $currency->symbol}})"
      	}
      ]
      
      var ctxb = $("#barChartDemo").get(0).getContext("2d");
      var barChart = new Chart(ctxb).Bar(data);
      
      var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
@endpush