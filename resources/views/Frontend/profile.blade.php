@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Profile @stop
@section('page-header')  Profile @stop
@section('page-header-desc') <small>welcome </small>  @stop
@section('content')

    <profile :user="{{ $user }}" media="{{$media}}" ></profile>
@stop

@section('js')
    <script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
@stop
