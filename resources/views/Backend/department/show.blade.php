@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - view department @stop
@section('page-header') Departments @stop
@section('page-header-desc') / {{ $department->name }}  @stop
@section('content')

    <view_department
        :department="{{ $department }}"
        documentroute="{{ route('admin.departments.retrieve-documents', $department->id) }}"
        action="{{ route('admin.department.process-documents', $department->id) }}"
    >
    </view_department>

@stop

