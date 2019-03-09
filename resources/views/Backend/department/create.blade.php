@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Create department @stop
@section('page-header') Departments @stop
@section('page-header-desc') / create a new department  @stop
@section('content')

    <department-create
        action="{{ route('admin.departments.store') }}">
    </department-create>

@stop

