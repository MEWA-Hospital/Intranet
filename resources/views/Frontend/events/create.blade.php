@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} | Upcoming Events  @stop

@section('page-header')  Events @stop
@section('page-header-desc')
    <small> Create event</small> @stop
@section('content')

    <front_create_event action="{{ route('frontend.events.store') }}"></front_create_event>

@stop
