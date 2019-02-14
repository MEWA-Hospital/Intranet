@extends('layouts.master')
@section('page-header')  Documents @stop
@section('content')

    <documents
        action="{{ route('frontend.documents.store') }}">
    </documents>


@stop

@section('js')
    <script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    <script>
        $('.form-input-styled').uniform();
    </script>
@stop
