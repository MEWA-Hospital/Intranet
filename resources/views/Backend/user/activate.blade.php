@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Edit user @stop
@section('page-header') USERS / @stop
@section('page-header-desc') active user account @stop
@section('content')
    <activate action="{{route('admin.users.activate')}}" :user="{{$inactiveUser}}"></activate>
@stop
