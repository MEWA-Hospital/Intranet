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
                        <div class="card-body">
                            <div class="mb-4">


                                <h4 class="font-weight-semibold mb-1">
                                    <a href="#" class="text-default">{{ $event->name }}</a>
                                </h4>

                                <ul class="list-inline list-inline-dotted text-muted mb-3">
                                    <li class="list-inline-item">Department: <a href="#"
                                                                       class="text-muted">{{ $event->department->name }}</a>
                                    </li>
                                    <li class="list-inline-item">{{ $event->created_at->format('M j Y, H:i:s') }}</li>
                                    {{--<li class="list-inline-item"><a href="#" class="text-muted">12 comments</a></li>--}}
                                    {{--<li class="list-inline-item"><a href="#" class="text-muted"><i--}}
                                                    {{--class="icon-eye font-size-base mr-2"></i> 281</a></li>--}}
                                </ul>

                                <div class="mb-3">
                                    <p>{!!  $event->body !!}</p>
                                </div>

                            </div>

                        </div>
                        <div class="card-footer"></div>
                    </div>
                    <hr class="divider">
                    <h4 class="card-title font-weight-semibold">Discussion</h4>
                    <!-- /event -->
                    <events></events>
                    <!-- Comments -->

                    <!-- /comments -->


                </div>
            </div>
        </event-page>
        <div class="col-md-3">
            <countdown until="{{ $event->start_date }}" ></countdown>
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">Event details</span>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>

                <ul class="list-group list-group-flush border-top">
                    <li class="list-group-item list-group-item-action">
									<span class="font-weight-semibold">
										<i class="icon-calendar3 mr-2"></i>
										Start Date
									</span>
                        <span class="ml-auto">{{ $event->start_date }}</span>
                    </li>
                    <li class="list-group-item list-group-item-action ">
									<span class="font-weight-semibold">
										<i class="icon-calendar5 mr-2"></i>
										End Date
									</span>
                        <span class="ml-auto">{{ $event->end_date }}</span>
                    </li>
                    <li class="list-group-item list-group-item-action">
									<span class="font-weight-semibold">
										<i class="icon-cube3 mr-2"></i>
										Venue
									</span>
                        <span class="badge bg-orange-400 ml-auto">{{ $event->venue }}</span>
                    </li>
                    <li class="list-group-item list-group-item-action">
									<span class="font-weight-semibold">
										<i class="icon-transmission mr-2"></i>
										Department
									</span>
                        <span class="badge bg-blue badge-pill ml-auto">{{ $event->department->name }}</span>
                    </li>
                </ul>

            </div>
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <span class="card-title font-weight-semibold text-purple-300">Employee of the month</span>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="icon-chess-king"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <ul class="media-list">
                        <li class="media">
                            <a href="#" class="mr-3">
                                <img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}"
                                     width="36"
                                     height="36" class="rounded-circle" alt="">
                            </a>
                            <div class="media-body">
                                <a href="#" class="media-title font-weight-semibold">John Doe</a>
                                <div class="font-size-sm text-muted">Nurse</div>
                            </div>

                        </li>
                    </ul>
                </div>
            </div>


            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <span class="card-title font-weight-semibold">Tags</span>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body pb-2">
                    <ul class="list-inline list-inline-condensed mb-0">
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="badge badge-light badge-striped badge-striped-left border-left-success mb-2">Audio</span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="badge badge-light badge-striped badge-striped-left border-left-warning mb-2">Gallery</span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="badge badge-light badge-striped badge-striped-left border-left-indigo mb-2">Image</span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="badge badge-light badge-striped badge-striped-left border-left-teal mb-2">Music</span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="badge badge-light badge-striped badge-striped-left border-left-pink mb-2">Blog</span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="badge badge-light badge-striped badge-striped-left border-left-purple mb-2">Learn</span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="badge badge-light badge-striped badge-striped-left border-left-blue mb-2">Youtube</span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="badge badge-light badge-striped badge-striped-left border-left-slate mb-2">Twitter</span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="badge badge-light badge-striped badge-striped-left border-left-orange mb-2">Eugene</span>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <span class="badge badge-light badge-striped badge-striped-left border-left-brown mb-2">Limitless</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>
@stop

@section('js')
    {{--<script src="{{ asset('global_assets/js/plugins/editors/summernote/summernote.min.js') }}"></script>--}}
    {{--<script src="{{ asset('global_assets/js/demo_pages/editor_summernote.js') }}"></script>--}}
@stop
