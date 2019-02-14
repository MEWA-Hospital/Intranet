@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Create Event @stop
@section('page-header') Events @stop
@section('page-header-desc') / Create Event @stop
@section('css')
    {{--<link rel="stylesheet" href="https://unpkg.com/vue-multiselect@2.1.0/dist/vue-multiselect.min.css">--}}
    @stop
@section('content')
    <div class="row">
        <div class="col-md-7 offset-md-2 col-sm-12 col-xs-12">
            <create-event
                action="{{ route('admin.events.store') }}"
                method="post"
                :departments="{{ $departments }}"
            ></create-event>
        </div>
    </div>

@stop
