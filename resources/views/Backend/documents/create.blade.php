@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Create department @stop
@section('page-header') Departments @stop
@section('page-header-desc') / create a new department  @stop
@section('content')

    <document-create
        action="{{ route('admin.documents.store') }}">
    </document-create>

@stop

