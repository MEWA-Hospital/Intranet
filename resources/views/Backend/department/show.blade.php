@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - view department @stop
@section('page-header') Departments @stop
@section('page-header-desc') / {{ $department->name }}  @stop
@section('content')

    <view_department
        :department="{{ $department }}"
        action="{{ route('admin.department.documents') }}"
        documents = {{ $documents }}
    >
    </view_department>

@stop

