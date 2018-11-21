@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Create Event @stop
@section('page-header') Events @stop
@section('page-header-desc') Add Event @stop
@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2 col-sm-12 col-xs-12">
            <create-event endpoint="events"></create-event>
        </div>
    </div>

@stop

@section('js')
    <script src="{{ asset('global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/pickers/daterangepicker.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/picker_date.js') }}"></script>
@stop
