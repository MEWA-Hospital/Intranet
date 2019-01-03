@extends('layouts.master')
@section('page-header')  Dashboard @stop
@section('page-header-desc')
    <small>welcome {{ auth()->user()->username }}</small>  @stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">

                    <div class="row">
                        <div class="col-md-12">
                            @if($upcomingEvents->count())
                                <div class="card">
                                    <div class="card-header header-elements-inline">
                                        <h6 class="card-title">Upcoming Events</h6>
                                    </div>
                                    <ul class="media-list media-list-linked media-list-bordered">
                                        @foreach($upcomingEvents as $event)
                                            <li>
                                                <a href="#" class="media">
                                                    <div class="media-body">
                                                        <div class="media-title d-flex justify-content-between">
                                                            <h6 class="m-0">{{ $event->name }}</h6>
                                                            <span
                                                                class="text-muted"> {{ $event->created_at->format('M j Y, H:i') }}</span>
                                                        </div>
                                                        Venue: {{ $event->venue }}
                                                    </div>
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            @else
                                <div class="card card-body">
                                    <p>There are no upcoming events rights now</p>
                                </div>
                            @endif
                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">Latest Biometric Clock-In </h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-border-dashed text-nowrap table-customers">
                                <thead>
                                <tr>
                                    <th>Date / Time</th>
                                    <th>Action</th>
                                    <th>Hours worked</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($biometricInOutDetails as $details)
                                    <tr>
                                        <td>{{ $details->For_Date }}</td>
                                        <td>{{ $details->In_Out_Flag }}</td>
                                        <td>{{ $details->In_Duration }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
