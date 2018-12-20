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
                    <h5 class="card-title">Data Governance course</h5>

                    <div class="header-elements">
                        <ul class="list-inline list-inline-dotted mb-0 mt-2 mt-md-0">
                            <li class="list-inline-item">Rating: <span class="font-weight-semibold">4.85</span></li>
                            <li class="list-inline-item">
                                <i class="icon-star-full2 font-size-base text-warning-300"></i>
                                <i class="icon-star-full2 font-size-base text-warning-300"></i>
                                <i class="icon-star-full2 font-size-base text-warning-300"></i>
                                <i class="icon-star-full2 font-size-base text-warning-300"></i>
                                <i class="icon-star-full2 font-size-base text-warning-300"></i>
                                <span class="text-muted ml-1">(439)</span>
                            </li>
                        </ul>
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
                                <h6 class="font-weight-semibold">Course overview</h6>
                                <p>Then sluggishly this camel learned woodchuck far stretched unspeakable
                                    notwithstanding the walked owing stung mellifluously glumly rooster more examined
                                    one that combed until a less less witless pouted up voluble timorously glared
                                    elaborate giraffe steady while grinned and got one beaver to walked. Connected
                                    picked rashly ocelot flirted while wherever unwound much more one inside emotionally
                                    well much woolly amidst upon far burned ouch sadistically became.</p>
                                <p>A collection of textile samples lay spread out on the table - Samsa was a travelling
                                    salesman - and above it there hung a picture that he had recently cut out of an
                                    illustrated magazine and housed in a nice, gilded frame. It showed a lady fitted out
                                    with a fur hat and fur boa who sat upright, raising a heavy fur muff that covered
                                    the whole of her lower arm towards the viewer. Gregor then turned to look out the
                                    window at the dull weather.</p>
                            </div>

                            <h6 class="font-weight-semibold">What you will learn</h6>
                            <p class="mb-3">Some cow goose out and sweeping wow the skillfully goodness one crazily far
                                some jeez darn well so peevish pending nudged categorically in between about much alas
                                handsome intolerable devotedly helpfully smiled momentously next much this this next
                                sweepingly far. Together prim and limpet much extravagantly quail longing a ouch that
                                walking a jeepers flamingo more.</p>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="mb-4">
                                        <dl>
                                            <dt class="font-size-sm font-weight-bold text-uppercase">
                                                <i class="icon-checkmark3 text-blue mr-2"></i>
                                                Salamander much that on much
                                            </dt>
                                            <dd>Like partook magic this enthusiastic tasteful far crud otter this the
                                                ferret honey iguana. Together prim and limpet much extravagantly quail
                                                longing.
                                            </dd>

                                            <dt class="font-size-sm font-weight-bold text-uppercase">
                                                <i class="icon-checkmark3 text-blue mr-2"></i>
                                                Well far some raccoon
                                            </dt>
                                            <dd>Python laudably euphemistically since this copious much human this
                                                briefly hello ouch less one diligent however impotently made gave a
                                                slick up much.
                                            </dd>

                                            <dt class="font-size-sm font-weight-bold text-uppercase">
                                                <i class="icon-checkmark3 text-blue mr-2"></i>
                                                Goldfish rapidly that far
                                            </dt>
                                            <dd>Well far some raccoon knew goose and crud behind salmon amenable oh the
                                                poignant sufficiently yikes a naked showed far reindeer imminently.
                                            </dd>

                                            <dt class="font-size-sm font-weight-bold text-uppercase">
                                                <i class="icon-checkmark3 text-blue mr-2"></i>
                                                Gregor then turned to look out
                                            </dt>
                                            <dd>Then sluggishly this camel learned woodchuck far stretched unspeakable
                                                notwithstanding the walked owing stung mellifluously glumly rooster.
                                            </dd>
                                        </dl>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="mb-4">
                                        <dl>
                                            <dt class="font-size-sm font-weight-bold text-uppercase">
                                                <i class="icon-checkmark3 text-blue mr-2"></i>
                                                Misunderstood cuffed more depending
                                            </dt>
                                            <dd>And earthworm dear arose bald agilely sad so below cowered within
                                                ceremonially therefore via much this symbolically and newt capably.
                                            </dd>

                                            <dt class="font-size-sm font-weight-bold text-uppercase">
                                                <i class="icon-checkmark3 text-blue mr-2"></i>
                                                Voluble much saddled mechanic
                                            </dt>
                                            <dd>Much took between less goodness jay mallard kneeled gnashed this up
                                                strong cooperative. A collection of textile samples lay spread.
                                            </dd>

                                            <dt class="font-size-sm font-weight-bold text-uppercase">
                                                <i class="icon-checkmark3 text-blue mr-2"></i>
                                                Before some one more
                                            </dt>
                                            <dd>Pending some contrary rabbit up that the more conditionally ouch
                                                confidently far so was darn logic thus dove the juicily because that
                                                placed otter.
                                            </dd>

                                            <dt class="font-size-sm font-weight-bold text-uppercase">
                                                <i class="icon-checkmark3 text-blue mr-2"></i>
                                                So slit more darn hey well wore
                                            </dt>
                                            <dd>Well far some raccoon knew goose and crud behind salmon amenable oh the
                                                poignant sufficiently yikes a naked showed far reindeer imminently.
                                            </dd>
                                        </dl>
                                    </div>
                                </div>
                            </div>

                            <h6 class="font-weight-semibold">Course program</h6>
                            So slit more darn hey well wore submissive savage this shark aardvark fumed thoughtfully
                            much drank when angelfish so outgrew some alas vigorously therefore warthog superb less oh
                            groundhog less alas gibbered barked some hey despicably with aesthetic hamster jay by
                            luckily. A collection of textile samples lay spread out on the table - Samsa was a
                            travelling salesman - and above it there hung a picture that he had recently cut out of an
                            illustrated magazine and housed in a nice, gilded frame
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Lessons</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><a href="#">Introduction</a></td>
                                    <td>One morning, when Gregor Samsa woke from troubled dreams, he found himself</td>
                                    <td>10 hours</td>
                                    <td><span class="badge bg-secondary">Closed</span></td>
                                    <td>Oct 21st, 2016</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="#">Design tools</a></td>
                                    <td>He lay on his armour-like back, and if he lifted his head a little he could</td>
                                    <td>20 hours</td>
                                    <td><span class="badge bg-primary">Registration</span></td>
                                    <td>Oct 22nd, 2016</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><a href="#">Workspace</a></td>
                                    <td>The bedding was hardly able to cover it and seemed ready to slide off moment
                                    </td>
                                    <td>35 hours</td>
                                    <td><span class="badge bg-danger">On time</span></td>
                                    <td>Oct 23rd, 2016</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><a href="#">Creating effects</a></td>
                                    <td>A collection of textile samples lay spread out on the table - Samsa salesman
                                    </td>
                                    <td>25 hours</td>
                                    <td><span class="badge bg-danger">On time</span></td>
                                    <td>Oct 24th, 2016</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td><a href="#">Digital design</a></td>
                                    <td>Drops of rain could be heard hitting the pane, which made him feel quite sad
                                    </td>
                                    <td>50 hours</td>
                                    <td><span class="badge bg-danger">On time</span></td>
                                    <td>Oct 25th, 2016</td>
                                </tr>
                                </tbody>
                            </table>
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
                                            <span class="d-block text-muted">Lead developer</span>


                                        </div>
                                    </div>
                                </div>

                                @if($count%4 == 0)
                        </div>
                        @endif
                        @php $count ++; @endphp
                        @endforeach
                        @php if ($count%4 != 1) echo "</div>"; @endphp
                        <div class="d-flex justify-content-center mt-3 mb-3">
                            <ul class="pagination">
                                <li class="page-item"><a href="#" class="page-link"><i
                                                class="icon-arrow-small-right"></i></a></li>
                                <li class="page-item active"><a href="#" class="page-link">1</a></li>
                                <li class="page-item"><a href="#" class="page-link">2</a></li>
                                <li class="page-item"><a href="#" class="page-link">3</a></li>
                                <li class="page-item"><a href="#" class="page-link">4</a></li>
                                <li class="page-item"><a href="#" class="page-link">5</a></li>
                                <li class="page-item"><a href="#" class="page-link"><i
                                                class="icon-arrow-small-left"></i></a></li>
                            </ul>
                        </div>
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
                <h6 class="card-title font-weight-semibold">
                    <i class="icon-folder6 mr-2"></i>
                    Documents
                </h6>
            </div>

            <div class="list-group list-group-flush">
                <a href="#" class="list-group-item list-group-item-action">
                    <i class="icon-file-pdf mr-3"></i>
                    Standard Operating Procedure.pdf <span class="badge bg-success-400 ml-auto">New</span>
                </a>

                <a href="#" class="list-group-item list-group-item-action">
                    <i class="icon-file-word mr-3"></i>
                    Standard Chatter.docx
                </a>

                <a href="#" class="list-group-item list-group-item-action">
                    <i class="icon-file-excel mr-3"></i>
                    Mission & vission.csv
                    <span class="badge bg-slate ml-auto">Draft</span>
                </a>

                <a href="#" class="list-group-item list-group-item-action">
                    <i class="icon-file-word mr-3"></i>
                    Into_intrepid_belated.docx
                </a>

                <a href="#" class="list-group-item list-group-item-action">
                    <i class="icon-arrow-right22 mr-3"></i>
                    Show all files (93)
                </a>
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