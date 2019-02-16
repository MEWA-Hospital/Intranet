@extends('layouts.master')
@section('page-header')  Documents @stop
@section('page-header-desc')
    <small>Upload Your Document</small> @stop
@section('content')

    <documents_upload action="{{ route('documents.store') }}"></documents_upload>

@stop

@section('js')
    <script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script>
        $('.form-input-styled').uniform();
    </script>
@stop
