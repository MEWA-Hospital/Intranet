@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Edit department @stop
@section('page-header') Events @stop
@section('page-header-desc') edit event @stop
@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">

            <edit-event :event="{{ $event }}"
                        :departments="{{ $departments }}"
                        action="{{ route('admin.events.update', $event->id) }}"
                        start_date="{{$start_date}}"
                        end_date="{{$end_date}}"
                        method="post"></edit-event>
        </div>
    </div>

@stop

