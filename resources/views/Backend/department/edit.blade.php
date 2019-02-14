@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Edit department @stop
@section('page-header') Departments @stop
@section('page-header-desc') edit department @stop
@section('content')

  <edit_department :department="{{ $department}}" action="{{ route('admin.departments.update', $department->id) }}" method="post"></edit_department>

@stop
