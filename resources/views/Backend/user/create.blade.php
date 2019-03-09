@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Create user @stop
@section('page-header') Users @stop
@section('page-header-desc') create user account @stop
@section('content')

    <user-create action="{{ route('admin.users.store') }}"></user-create>
@stop


