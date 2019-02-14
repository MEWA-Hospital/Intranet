@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Edit Employee @stop
@section('page-header') EMPLOYEES @stop
@section('page-header-desc') / edit employee @stop
@section('content')

    <edit_employee
        :employee="{{$employee}}"
        departmentlink="{{ route('admin.departments.index') }}"
        employeetypelink="{{ route('admin.employee-type.index') }}"
        action="{{ route('admin.employees.update', $employee->id) }}"
        method="post">
    </edit_employee>

@stop
