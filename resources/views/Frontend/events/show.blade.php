@extends('layouts.master')
@section('page-header')  Events @stop
@section('page-header-desc')
    <small> Event details</small> @stop
@section('content')
    <div class="row">
        <news  inline-template>
        <div class="col-md-9">
            <div class="w-100 overflow-auto order-2 order-md-1">

                    <!-- Post -->
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-4">


                                <h4 class="font-weight-semibold mb-1">
                                    <a href="#" class="text-default">{{ $event->name }}</a>
                                </h4>

                                <ul class="list-inline list-inline-dotted text-muted mb-3">
                                    <li class="list-inline-item">By <a href="#"
                                                                       class="text-muted">{{ $event->department->name }}</a>
                                    </li>
                                    <li class="list-inline-item">{{ $event->created_at }}</li>
                                    <li class="list-inline-item"><a href="#" class="text-muted">12 comments</a></li>
                                    <li class="list-inline-item"><a href="#" class="text-muted"><i
                                                    class="icon-eye font-size-base mr-2"></i> 281</a></li>
                                </ul>

                                <div class="mb-3">
                                    <p>{!!  $event->body !!}</p>
                                </div>

                            </div>

                        </div>
                    </div>
                    <!-- /post -->

                    <!-- About author -->
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h6 class="card-title">About the author</h6>

                            <div class="header-elements">
                                <div class="list-icons list-icons-extended">
                                    <a href="#" class="list-icons-item" data-popup="tooltip" data-container="body"
                                       title=""
                                       data-original-title="Google Drive"><i class="icon-google-drive"></i></a>
                                    <a href="#" class="list-icons-item" data-popup="tooltip" data-container="body"
                                       title=""
                                       data-original-title="Twitter"><i class="icon-twitter"></i></a>
                                    <a href="#" class="list-icons-item" data-popup="tooltip" data-container="body"
                                       title=""
                                       data-original-title="Github"><i class="icon-github"></i></a>
                                    <a href="#" class="list-icons-item" data-popup="tooltip" data-container="body"
                                       title=""
                                       data-original-title="Linked In"><i class="icon-linkedin"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="media card-body flex-column flex-md-row m-0">
                            <div class="mr-md-3 mb-2 mb-md-0">
                                <a href="#">
                                    <img src="../../../../global_assets/images/placeholders/placeholder.jpg"
                                         class="rounded-circle" width="64" height="64" alt="">
                                </a>
                            </div>

                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold">James Alexander</h6>
                                <p>So slit more darn hey well wore submissive savage this shark aardvark fumed
                                    thoughtfully
                                    much drank when angelfish so outgrew some alas vigorously therefore warthog superb
                                    less
                                    oh groundhog less alas gibbered barked some hey despicably with aesthetic hamster
                                    jay by
                                    luckily</p>

                                <ul class="list-inline list-inline-dotted mb-0">
                                    <li class="list-inline-item"><a href="#">Author profile</a></li>
                                    <li class="list-inline-item"><a href="#">All posts by James</a></li>

                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- /about author -->

                    <!-- Comments -->
                    <div class="card">
                        <div class="card-header header-elements-inline">
                            <h6 class="card-title font-weight-semibold">Discussion</h6>
                            <div class="header-elements">
                                <ul class="list-inline list-inline-dotted text-muted mb-0">
                                    <li class="list-inline-item" ></li>
                                </ul>
                            </div>
                        </div>

                        <div class="card-body">
                            <ul class="media-list">

                                <comments></comments>

                            </ul>
                        </div>


                    </div>
                    <!-- /comments -->


            </div>
        </div>
        </news>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">Event countdown</span>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-center mb-4">
                        <a href="#" class="badge bg-grey-300 mx-1">Mon</a>
                        <a href="#" class="badge bg-danger mx-1">Tue</a>
                        <a href="#" class="badge bg-grey-300 mx-1">Wed</a>
                        <a href="#" class="badge bg-grey-300 mx-1">Thu</a>
                        <a href="#" class="badge bg-grey-300 mx-1">Fri</a>
                        <a href="#" class="badge bg-grey-300 mx-1">Sat</a>
                        <a href="#" class="badge bg-grey-300 mx-1">Sun</a>
                    </div>

                    <div class="d-flex justify-content-center text-center mb-2">
                        <div class="timer-number font-weight-light">
                            09 <span class="d-block font-size-base mt-2">hours</span>
                        </div>
                        <div class="timer-dots mx-1">:</div>
                        <div class="timer-number font-weight-light">
                            54 <span class="d-block font-size-base mt-2">minutes</span>
                        </div>
                        <div class="timer-dots mx-1">:</div>
                        <div class="timer-number font-weight-light">
                            29 <span class="d-block font-size-base mt-2">seconds</span>
                        </div>
                    </div>
                </div>

                <div class="card-footer d-flex align-items-center">

                </div>
            </div>
            <div class="card">
                <div class="card-header bg-transparent header-elements-inline">
                    <span class="text-uppercase font-size-sm font-weight-semibold">Event details</span>
                    <div class="header-elements">
                        <div class="list-icons">
                            <a class="list-icons-item" data-action="collapse"></a>
                        </div>
                    </div>
                </div>


                <table class="table table-borderless table-xs border-top-0 my-2">
                    <tbody>

                    <tr>
                        <td class="font-weight-semibold">Start date:</td>
                        <td class="text-right">{{ $event->start_date }}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-semibold">End date:</td>
                        <td class="text-right">{{ $event->start_date }}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-semibold">Venue:</td>
                        <td class="text-right">{{ $event->venue }}</td>
                    </tr>
                    <tr>
                        <td class="font-weight-semibold">Department:</td>
                        <td class="text-right">{{ $event->department->name }}</td>
                    </tr>

                    </tbody>
                </table>
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
