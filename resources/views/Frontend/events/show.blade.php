@extends('layouts.master')
@section('page-header')  Events @stop
@section('page-header-desc')
    <small> Event details</small> @stop
@section('content')
    <div class="row">
        <event-page inline-template>
            <div class="col-md-9">
                <div class="w-100 overflow-auto order-2 order-md-1">

                    <!-- event -->
                    <div class="card">
                        <div class="card-header bg-white header-elements-sm-inline"></div>
                        <div class="card-body">
                            <div class="mb-4">


                                <h4 class="font-weight-semibold mb-1">
                                    <a href="#" class="text-default">{{ $event->name }}</a>
                                </h4>

                                <ul class="list-inline list-inline-dotted text-muted mb-3">
                                    <li class="list-inline-item">Department: <a href="#"
                                                                                class="text-muted">{{ $event->department->name }}</a>
                                    </li>
                                    <li class="list-inline-item">{{ $event->start_date->format('M j Y, H:i:s') }}</li>
                                    {{--<li class="list-inline-item"><a href="#" class="text-muted">12 comments</a></li>--}}
                                    {{--<li class="list-inline-item"><a href="#" class="text-muted"><i--}}
                                    {{--class="icon-eye font-size-base mr-2"></i> 281</a></li>--}}
                                </ul>

                                <div class="mb-3">
                                    <p>{!!  $event->body !!}</p>
                                </div>

                            </div>

                        </div>
                    </div>

                    <h4 class="card-title font-weight-semibold">Discussion</h4>
                    <!-- /event -->
                    <events></events>
                    <!-- Comments -->

                    <!-- /comments -->


                </div>
            </div>
        </event-page>
        <div class="col-md-3">

            <countdown until="{{ $event->start_date }}"></countdown>

            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">Event details</span>
                </div>

                <ul class="list-group list-group-flush border-top">
                    <li class="list-group-item list-group-item-action">
									<span class="font-weight-semibold">
										<i class="icon-calendar3 mr-2"></i>
										Start Date
									</span>
                        <span class="ml-auto">{{ $event->start_date->format('j M, Y') }}</span>
                    </li>
                    <li class="list-group-item list-group-item-action ">
									<span class="font-weight-semibold">
										<i class="icon-calendar5 mr-2"></i>
										End Date
									</span>
                        <span class="ml-auto">{{ $event->end_date->format('j M, Y') }}</span>
                    </li>
                    <li class="list-group-item list-group-item-action">
                        <span class="font-weight-semibold"><i class="icon-cube3 mr-2"></i>Venue </span>
                        <span class=" ml-auto">{{ $event->venue }} </span>
                    </li>
                    <li class="list-group-item list-group-item-action">
									<span class="font-weight-semibold">
										<i class="icon-transmission mr-2"></i>
										Department
									</span>
                        <span class=" ml-auto">{{ $event->department->name }}</span>
                    </li>
                </ul>

            </div>

        </div>

    </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{asset('vendor/At.js/dist/css/jquery.atwho.min.css')}}">
@stop

