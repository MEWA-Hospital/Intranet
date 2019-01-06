@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} | Upcoming Events  @stop

@section('page-header')  Events @stop
@section('page-header-desc')
    <small> Upcoming events</small> @stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="order-2 order-md-1">

                <!-- Filter toolbar -->
            {{--<div class="navbar navbar-expand-lg navbar-light navbar-component rounded">--}}
            {{--<div class="text-center d-lg-none w-100">--}}
            {{--<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse"--}}
            {{--data-target="#navbar-filter">--}}
            {{--<i class="icon-unfold mr-2"></i>--}}
            {{--Filters--}}
            {{--</button>--}}
            {{--</div>--}}

            {{--<div class="navbar-collapse collapse" id="navbar-filter">--}}
            {{--<span class="navbar-text font-weight-semibold mr-3">--}}
            {{--Filter:--}}
            {{--</span>--}}

            {{--<ul class="navbar-nav flex-wrap">--}}
            {{--<li class="nav-item dropdown">--}}
            {{--<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown"--}}
            {{--aria-expanded="false">--}}
            {{--<i class="icon-sort-time-asc mr-2"></i>--}}
            {{--By date--}}
            {{--</a>--}}

            {{--<div class="dropdown-menu">--}}
            {{--<a href="#" class="dropdown-item">Show all</a>--}}
            {{--<div class="dropdown-divider"></div>--}}
            {{--<a href="#" class="dropdown-item">Today</a>--}}
            {{--<a href="#" class="dropdown-item">Yesterday</a>--}}
            {{--<a href="#" class="dropdown-item">This week</a>--}}
            {{--<a href="#" class="dropdown-item">This month</a>--}}
            {{--<a href="#" class="dropdown-item">This year</a>--}}
            {{--</div>--}}
            {{--</li>--}}



            {{--<li class="nav-item dropdown">--}}
            {{--<a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown"--}}
            {{--aria-expanded="false">--}}
            {{--<i class="icon-sort-numeric-asc mr-2"></i>--}}
            {{--By department--}}
            {{--</a>--}}

            {{--<div class="dropdown-menu">--}}
            {{--<a href="#" class="dropdown-item">Show all</a>--}}
            {{--<div class="dropdown-divider"></div>--}}
            {{--<a href="#" class="dropdown-item">Highest</a>--}}
            {{--<a href="#" class="dropdown-item">High</a>--}}
            {{--<a href="#" class="dropdown-item">Normal</a>--}}
            {{--<a href="#" class="dropdown-item">Low</a>--}}
            {{--</div>--}}
            {{--</li>--}}
            {{--</ul>--}}

            {{--</div>--}}
            {{--</div>--}}
            <!-- /filter toolbar -->

                <!-- Events  -->
                <div class="row">
                    @forelse($events as $event)
                        <div class="col-xl-3">
                            <div class="card border-default">
                                @if( $loop->iteration % 3 )
                                    <div class="card-header alpha-success border-blue d-flex justify-content-between">
                                        <span
                                            class="font-size-sm text-uppercase ">{{ $event->start_date->format('F j, Y') }}</span>
                                        <span
                                            class="font-size-sm  text-success-700 font-weight-semibold">Due in {{ $event->start_date->diffForHumans() }}</span>
                                    </div>
                                @else
                                    <div class="card-header bg-light border-orange d-flex justify-content-between">
                                        <span
                                            class="font-size-sm text-uppercase ">{{ $event->start_date->format('F j, Y') }}</span>
                                        <span
                                            class="font-size-sm text-success-700 font-weight-semibold">Due in {{ $event->start_date->diffForHumans() }}</span>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <h6 class="card-title"><a href="{{ route('frontend.events.show', $event->id) }}"
                                                              class="text-default">{{str_limit($event->name, 50, '...')}} </a>
                                    </h6>
                                    <p class="card-text"></p>
                                </div>

                                <div
                                    class="card-footer bg-transparent d-flex justify-content-between border-top-0 pt-0">
                                    <span class="text-muted">Venue: {{$event->venue}} </span>
                                    <span>

									<span class="text-muted ml-2">
                                            <i class="icon-eye "></i> {{ $event->visits()->count() }}</span>
								</span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="card text-center offset-md-3 col-md-6 col-xs-12">
                            <div class="card-body">
                                <i class="icon-info3 icon-2x text-info border-success border-3 rounded-round p-3 mb-3"></i>
                                <h5 class="card-title">There are no upcoming events right now!</h5>


                            </div>
                        </div>
                    @endforelse
                </div>
                <!-- /Events  -->

                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-3 mb-3">
                    <ul class="pagination">
                        {{ $events->links() }}

                    </ul>
                </div>
                <!-- /pagination -->

            </div>

        </div>
        {{--<div class="col-md-3">--}}
        {{--<div class="card">--}}
        {{--<div class="card-header bg-transparent header-elements-inline">--}}
        {{--<span class="card-title font-weight-semibold text-purple-300">Employee of the month</span>--}}
        {{--<div class="header-elements">--}}
        {{--<div class="list-icons">--}}
        {{--<a class="icon-chess-king"></a>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--<div class="card-body">--}}
        {{--<ul class="media-list">--}}
        {{--<li class="media">--}}
        {{--<a href="#" class="mr-3">--}}
        {{--<img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}"--}}
        {{--width="36"--}}
        {{--height="36" class="rounded-circle" alt="">--}}
        {{--</a>--}}
        {{--<div class="media-body">--}}
        {{--<a href="#" class="media-title font-weight-semibold">John Doe</a>--}}
        {{--<div class="font-size-sm text-muted">Nurse</div>--}}
        {{--</div>--}}

        {{--</li>--}}
        {{--</ul>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--<div class="card bg-green-400 text-white text-center p-3"--}}
        {{--style="background-image: url(http://demo.interface.club/limitless/assets/images/bg.png); background-size: contain;">--}}
        {{--<div>--}}
        {{--<a href="#"--}}
        {{--class="btn btn-lg btn-icon mb-3 mt-1 btn-outline text-white border-white bg-white rounded-round border-2">--}}
        {{--<i class="icon-quotes-right"></i>--}}
        {{--</a>--}}
        {{--</div>--}}

        {{--<blockquote class="blockquote mb-0">--}}
        {{--<p>"Delivered is to ye belonging enjoyment preferred. Astonished and acceptance men two--}}
        {{--discretion"</p>--}}
        {{--<footer class="blockquote-footer text-white">--}}
        {{--<span>--}}
        {{--Someone famous in <cite title="Source Title">Source Title</cite>--}}
        {{--</span>--}}
        {{--</footer>--}}
        {{--</blockquote>--}}
        {{--</div>--}}

        {{--<div class="card">--}}
        {{--<div class="card-body text-center">--}}
        {{--<i class="icon-book icon-2x text-success-400 border-success-400 border-3 rounded-round p-3 mb-3 mt-1"></i>--}}
        {{--<h5 class="card-title">Knowledge Base</h5>--}}
        {{--<p class="mb-3">Ouch found swore much dear conductively hid submissively hatchet vexed far</p>--}}
        {{--<a href="#" class="btn bg-success-400">Browse articles</a>--}}
        {{--</div>--}}
        {{--</div>--}}

        {{--</div>--}}
    </div>
@stop
