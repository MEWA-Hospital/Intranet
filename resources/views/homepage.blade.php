@extends('layouts.master')
@section('page-header') Daashboard @stop

@section('content')

    <div class="row">
        <div class="col-md-9">
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h6 class="card-title">This just in</h6>
                        </div>

                        <div class="card-body">
                            <div class="media">
                                <div class="mr-3">
                                    <a href="#">
                                        <img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}" class="rounded-circle" width="44" height="44" alt="">
                                    </a>
                                </div>

                                <div class="media-body">
                                    <h6 class="media-title">So alas some intriguing</h6>
                                    But darn discarded stubbornly far a after aboard well unimaginative ruthless and flamingo cow

                                    <div class="text-muted mt-1"><i class="icon-check"></i> Just now</div>
                                </div>
                            </div>

                            <div class="media">
                                <div class="mr-3">
                                    <a href="#">
                                        <img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}" class="rounded-circle" width="44" height="44" alt="">
                                    </a>
                                </div>

                                <div class="media-body">
                                    <h6 class="media-title">A blissful caterpillar</h6>
                                    Man-of-war so where far up as less yikes thus at more yet so hardheadedly some hey darn dry now

                                    <div class="text-muted mt-1"><i class="icon-pin-alt"></i> &nbsp;4 hours ago from Thailand</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h6 class="card-title">Upcoming Events</h6>
                        </div>
                        <div class="card-body">
                            <div class="list-feed">
                                <div class="list-feed-item border-warning-400">
                                    <div class="text-muted font-size-sm mb-1">12 minutes ago</div>
                                    <a href="#">David Linner</a> requested refund for a double card charge
                                </div>

                                <div class="list-feed-item border-warning-400">
                                    <div class="text-muted font-size-sm mb-1">12 minutes ago</div>
                                    User <a href="#">Christopher Wallace</a> is awaiting for staff reply
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-success text-white header-elements-inline">
                    <h6 class="card-title">Compulsory read</h6>
                </div>
                <div class="card-body">
                    <div class="media">
                        <div class="media-body">
                            <h6 class="media-title font-weight-semibold"><a href="#" class="text-teal-400">Snuffed the
                                    reproachful</a></h6>
                            Near one brightly some remade aside a concretely some or this and onto arch dear far gerbil
                            so great
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header"><h6 class="card-title">Look Who's new</h6></div>
                <div class="card-body">
                    <li class="media">
                        <div class="mr-3">
                            <a href="#">
                                <img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}"
                                     class="rounded-circle" width="44" height="44" alt="">
                            </a>
                        </div>

                        <div class="media-body">
                            <h6 class="media-title">Ustadh Panadol</h6>
                            <p class="muted">Assistant Kikoto</p>
                        </div>
                    </li>
                </div>
            </div>

            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <span class="card-title font-weight-semibold">Staff members</span>
                    <div class="header-elements">
                        <span class="badge badge-success badge-pill">12 online</span>
                    </div>
                </div>

                <div class="card-body">
                    <ul class="media-list">
                        <li class="media">
                            <a href="#" class="mr-3">
                                <img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}" class="rounded-circle" width="36" height="36" alt="">
                            </a>
                            <div class="media-body">
                                <a href="#" class="media-title font-weight-semibold text-default">Will Jankins</a>
                                <span class="font-size-sm text-muted d-block"><span class="badge badge-mark border-success mr-1"></span> General questions</span>
                            </div>
                            <div class="align-self-center ml-3">
                                <div class="list-icons">
                                    <a href="#" class="list-icons-item"><i class="icon-comment-discussion"></i></a>
                                </div>
                            </div>
                        </li>

                        <li class="media">
                            <a href="#" class="mr-3">
                                <img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}" class="rounded-circle" width="36" height="36" alt="">
                            </a>
                            <div class="media-body">
                                <a href="#" class="media-title font-weight-semibold text-default">Margo Baker</a>
                                <span class="font-size-sm text-muted d-block"><span class="badge badge-mark border-danger mr-1"></span> Financial team</span>
                            </div>
                            <div class="align-self-center ml-3">
                                <div class="list-icons">
                                    <a href="#" class="list-icons-item"><i class="icon-comment-discussion"></i></a>
                                </div>
                            </div>
                        </li>

                        <li class="media">
                            <a href="#" class="mr-3">
                                <img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}" class="rounded-circle" width="36" height="36" alt="">
                            </a>
                            <div class="media-body">
                                <a href="#" class="media-title font-weight-semibold text-default">Beatrix Diaz</a>
                                <span class="font-size-sm text-muted d-block"><span class="badge badge-mark border-primary mr-1"></span> Item support</span>
                            </div>
                            <div class="align-self-center ml-3">
                                <div class="list-icons">
                                    <a href="#" class="list-icons-item"><i class="icon-comment-discussion"></i></a>
                                </div>
                            </div>
                        </li>

                        <li class="media">
                            <a href="#" class="mr-3">
                                <img src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}" class="rounded-circle" width="36" height="36" alt="">
                            </a>
                            <div class="media-body">
                                <a href="#" class="media-title font-weight-semibold text-default">Richard Vango</a>
                                <span class="font-size-sm text-muted d-block"><span class="badge badge-mark border-grey-300 mr-1"></span> Intellectual property</span>
                            </div>
                            <div class="align-self-center ml-3">
                                <div class="list-icons">
                                    <a href="#" class="list-icons-item"><i class="icon-comment-discussion"></i></a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@stop
