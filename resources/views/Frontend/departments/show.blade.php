@extends('layouts.master')
@section('page-header')  Departments @stop
@section('page-header-desc')
    <small> {{ $department->name }}</small> @stop
@section('content')
    <div class="row">
        <div class="col-md-9">
            <!-- Course overview -->
            <div class="card">
                <div class="card-header header-elements-md-inline">
                    <h5 class="card-title">{{ $department->name }}</h5>

                    <div class="header-elements">
                        {{--<ul class="list-inline list-inline-dotted mb-0 mt-2 mt-md-0">--}}
                            {{--<li class="list-inline-item font-weight-semibold">Extension--}}
                                {{--<i class="icon-phone font-size-base text-purple"></i> :--}}
                            {{--</li>--}}
                            {{--<li class="list-inline-item">--}}
                                {{--<span class="text-muted ml-1">(439)</span>--}}
                                {{--<span class="text-muted ml-1">(439)</span>--}}
                                {{--<span class="text-muted ml-1">(439)</span>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    </div>
                </div>

                <div class="nav-tabs-responsive bg-light border-top">
                    <ul class="nav nav-tabs nav-tabs-bottom flex-nowrap mb-0">
                        <li class="nav-item"><a href="#course-overview" class="nav-link active" data-toggle="tab"><i
                                    class="icon-menu7 mr-2"></i> Overview</a></li>
                        <li class="nav-item"><a href="#department-employees" class="nav-link" data-toggle="tab"><i
                                    class="icon-people mr-2"></i> Employees</a></li>
                        <li class="nav-item"><a href="#events-schedule" class="nav-link" data-toggle="tab"><i
                                    class="icon-calendar3 mr-2"></i> Events</a></li>
                        {{--<li class="nav-item"><a href="#events-schedule" class="nav-link" data-toggle="tab"><i--}}
                        {{--class="icon-file-word mr-2"></i> Memo</a></li>--}}
                    </ul>
                </div>

                <div class="tab-content">
                    <div class="tab-pane fade show active" id="course-overview">
                        <div class="card-body">
                            <div class="mt-1 mb-4">
                                <h6 class="font-weight-semibold">Department overview</h6>
                                {!! $department->overview !!}
                            </div>


                        </div>

                    </div>

                    <div class="tab-pane fade" id="department-employees">
                        <div class="card-body">
                            @php $count = 1; @endphp
                            @foreach($department->employees as $employee)
                                @php if($count%4 == 1)
                                    echo "<div class='row'>"
                                @endphp
                                <div class="col-xl-3 col-sm-6">
                                    <div class="card">
                                        <div class="card-img-actions">
                                            <img class="card-img-top img-fluid"
                                                 src="{{ asset('global_assets/images/placeholders/placeholder.jpg') }}"
                                                 alt="">
                                            <div class="card-img-actions-overlay card-img-top">
                                                <a href="#"
                                                   class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round">
                                                    <i class="icon-plus3"></i>
                                                </a>
                                                <a href="{{ route('profile.index', $employee->id) }}"
                                                   class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round ml-2">
                                                    <i class="icon-link"></i>
                                                </a>
                                            </div>
                                        </div>

                                        <div class="card-body text-center">
                                            <h6 class="font-weight-semibold mb-0">{{ $employee->name }}</h6>
                                            <span class="d-block text-muted">{{ $employee->designation }}</span>


                                        </div>
                                    </div>
                                </div>

                                @if($count%4 == 0)
                        </div>
                        @endif
                        @php $count ++; @endphp
                        @endforeach
                        @php if ($count%4 != 1) echo "</div>"; @endphp
                        {{--<div class="d-flex justify-content-center mt-3 mb-3">--}}
                            {{--<ul class="pagination">--}}
                                {{--<li class="page-item"><a href="#" class="page-link"><i--}}
                                            {{--class="icon-arrow-small-right"></i></a></li>--}}
                                {{--<li class="page-item active"><a href="#" class="page-link">1</a></li>--}}
                                {{--<li class="page-item"><a href="#" class="page-link">2</a></li>--}}
                                {{--<li class="page-item"><a href="#" class="page-link">3</a></li>--}}
                                {{--<li class="page-item"><a href="#" class="page-link">4</a></li>--}}
                                {{--<li class="page-item"><a href="#" class="page-link">5</a></li>--}}
                                {{--<li class="page-item"><a href="#" class="page-link"><i--}}
                                            {{--class="icon-arrow-small-left"></i></a></li>--}}
                            {{--</ul>--}}
                        {{--</div>--}}
                    </div>
                </div>

                <div class="tab-pane fade" id="events-schedule">
                    <div class="card-body">
                        <div class="schedule"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header bg-transparent header-elements-inline">
                <span class="text-uppercase font-size-sm font-weight-semibold">Documents </span>
            </div>

            <div class="card-body">
                <ul class="media-list">
                    @forelse($documentsCollection as $documents)
                        @foreach($documents as $document)
                            <li class="media">
                                <div class="mr-3 align-self-center">
                                    <i class="icon-file-word icon-2x text-primary-300 top-0"></i>
                                </div>

                                <div class="media-body">
                                    <div class="font-weight-semibold">{{ $document->file_name }}</div>
                                    <ul class="list-inline list-inline-dotted list-inline-condensed font-size-sm text-muted">
                                    </ul>
                                </div>

                                <div class="ml-3">
                                    <div class="list-icons">
                                        <a href="#" class="list-icons-item"><i class="icon-download"></i></a>
                                    </div>
                                </div>
                                    @endforeach
                                @empty

                            </li>
                        @endforelse
                </ul>
            </div>
        </div>
    </div>
    </div>
@stop

@push('js')
    <script src="{{ asset('global_assets/js/plugins/ui/moment/moment.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/ui/fullcalendar/fullcalendar.min.js') }}"></script>
    {{--<script src="{{ asset('global_assets/js/demo_pages/learning_detailed.js') }}"></script>--}}

    <script>
        $(document).ready(function () {
            $('.schedule').fullCalendar({
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
                defaultDate: '2018-12-18',
                editable: true,
                events: [
                        @foreach($department->events as $event)
                    {
                        title: '{{ $event->name  }}',
                        start: '{{ $event->start_date->toIso8601String() }}',

                        end: '{{ $event->end_date }}',

                    },
                    @endforeach
                ],
            });
        })
    </script>
@endpush
