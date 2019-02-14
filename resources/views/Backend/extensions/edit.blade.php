@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Edit department @stop
@section('page-header') Extensions @stop
@section('page-header-desc')  / edit extension {{ $extension->ext_no }} @stop
@section('content')

    <edit_extension
        action="{{ route('admin.extensions.update', $extension->id) }}"
        :extension="{{ $extension }}"
        :departments="{{ $departments }}"
        :employees="{{ $employees }}"
        method="post"></edit_extension>

@stop
