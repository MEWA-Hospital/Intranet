@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Create user @stop
@section('page-header') Users @stop
@section('page-header-desc') create user account @stop
@section('content')

    <create_user action="{{ route('admin.users.store') }}"></create_user>
@stop


