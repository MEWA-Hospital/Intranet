@extends('layouts.master')
@section('page-header')  Documents @stop
@section('page-header-desc')
    <small>documents from all departments</small> @stop
@section('content')

    <documents></documents>

@stop

@section('js')
    <script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script>
        $('.form-input-styled').uniform();
    </script>
@stop
