@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Create Event @stop
@section('page-header') Events @stop
@section('page-header-desc') Add Event @stop
@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2 col-sm-12 col-xs-12">
            <create-event action="{{ action('EventsController@store') }}" method="post"></create-event>
        </div>
    </div>

@stop
