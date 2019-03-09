@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Edit department @stop
@section('page-header') DEPARTMENTS @stop
@section('page-header-desc') edit department @stop
@section('content')

  <department-edit
      :department="{{ $department}}"
      action="{{ route('admin.departments.update', $department->id) }}">
  </department-edit>

@stop
