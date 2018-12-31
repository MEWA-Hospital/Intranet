@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - view department @stop
@section('page-header') Departments @stop
@section('page-header-desc') / {{ $department->name }}  @stop
@section('content')

    <view_department
        :department="{{ $department }}"
        docRoute="{{ route('admin.department.process-documents') }}"
        documents = {{ $documents }}
    >
    </view_department>

@stop

