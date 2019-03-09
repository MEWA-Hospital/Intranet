@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Edit user @stop
@section('page-header') Users @stop
@section('page-header-desc') edit user account @stop
@section('content')

    <user-edit :user="{{$user}}" action="{{ route('admin.users.update', $user->id)}}"></user-edit>

@stop
