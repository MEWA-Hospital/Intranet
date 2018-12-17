@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Activate user @stop
@section('page-header') USERS / @stop
@section('page-header-desc') activate user account @stop
@section('content')
    <activate action="{{route('admin.users.activate')}}" :user="{{$inactiveUser}}"></activate>
@stop

@section('js')
    <script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/form_inputs.js') }}"></script>
@stop
