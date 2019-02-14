@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Create department @stop
@section('page-header') Extensions @stop
@section('page-header-desc')  / create a new extension number  @stop
@section('content')
    <create_extension method="post" action="{{ route('admin.extensions.store') }}" :departments="{{ $departments }}" :employees="{{ $employees }}"></create_extension>
@stop

