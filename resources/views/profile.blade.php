@extends('layouts.master')
@section('page-header')  Profile @stop
@section('page-header-desc')
    <small>welcome </small>  @stop
@section('content')
    <profile :user="{{ $user }}" media="{{$media}}" picture="{{$profilePicture}}" :authenticated="{{auth()->user() }}" action="{{ route('change.password', $user->id) }}"></profile>
@stop

@section('js')
    <script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
@stop
