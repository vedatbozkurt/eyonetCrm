@extends('backend/layout/master')

@push('css')
<!-- Page specific styles -->
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
@endpush

@section('title', 'Teestmm List')


@section('contentTitle', 'Teest List Page')
@section('content')
test içerik {{ __('login.signin') }}
@endsection



@push('js')
<!-- Page specific javascripts -->
<!-- jQuery -->
<script src="//code.jquery.com/jquery.js"></script>
<!-- DataTables -->
<script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
<!-- <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="/vendor/datatables/buttons.server-side.js"></script> -->
@endpush