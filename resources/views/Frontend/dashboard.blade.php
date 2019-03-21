@extends('layouts.master')
@section('page-header')  Dashboard @stop
@section('page-header-desc')
    <small>Welcome {{ Auth::user()->username }} to MEWA Intranet page, get started by readin
        the service charter. </small>  @stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h6 class="card-title">Events and Upcoming Events</h6>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-border-dashed text-nowrap table-customers" id="table">
                                        <thead>

                                        <tr>
                                            <th>Name</th>
                                            <th>Venue</th>
                                            <th>Department</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="col-md-3">
                    @if(count($newEmployees))
                    <div class="card">
                        <div class="card-header bg-transparent header-elements-inline">
                            <span class="card-title font-weight-semibold">New Employees</span>

                        </div>
                        <div class="card-body">
                            @foreach($newEmployees as $employee)
                                <div class="media">
                                    <div class="mr-3">
                                        <a href="#">
                                            <img src="../../../../global_assets/images/placeholders/placeholder.jpg"
                                                 class="rounded" width="38" height="38" alt="">
                                        </a>
                                    </div>

                                    <div class="media-body">
                                        <div class="media-title font-weight-semibold">{{ $employee->name }}</div>
                                        <span class="badge bg-success">{{ $employee->designation }} </span>
                                    </div>

                                    <div class="ml-3 align-self-center">
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    @endif

                        @if(count($birthdays))
                            <div class="card">
                                <div class="card-header bg-transparent header-elements-inline">
                                    <span class="card-title font-weight-semibold">Today's Birthdays</span>

                                </div>
                                <div class="card-body">
                                    @foreach($birthdays as $employee)
                                        <div class="media">
                                            <div class="mr-3">
                                                <a href="#">
                                                    <img src="../../../../global_assets/images/placeholders/placeholder.jpg"
                                                         class="rounded" width="38" height="38" alt="">
                                                </a>
                                            </div>

                                            <div class="media-body">
                                                <div class="media-title font-weight-semibold">{{ $employee->name }}</div>
                                                <span class="badge bg-success">{{ $employee->designation }} </span>
                                            </div>

                                            <div class="ml-3 align-self-center">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>

                            </div>
                        @endif


                        {{--<div class="card card-body">--}}
                            {{--<div class="media flex-column flex-sm-row">--}}


                                {{--<div class="media-body">--}}
                                    {{--<h6 class="media-title"><a href="#">Up unpacked friendly</a></h6>--}}
                                    {{--<ul class="list-inline list-inline-dotted text-muted mb-2">--}}
                                        {{--<li class="list-inline-item"><i class="icon-book-play mr-2"></i> Video tutorials</li>--}}
                                    {{--</ul>--}}
                                    {{--The him father parish looked has sooner. Attachment frequently son--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}

                    @if(auth()->user()->employee)
                        <div class="card">
                            <div class="card-header bg-transparent header-elements-inline">
                                <h6 class="card-title font-weight-semibold">
                                    <i class="icon-folder6 mr-2"></i>
                                    Department Documents
                                </h6>

                            </div>

                            <div class="list-group list-group-flush">

                                @foreach($documentsCollection as $collection)
                                    @foreach($collection as $document)
                                        <a href="{{ route('frontend.download.document', $document ) }}"
                                           class="list-group-item list-group-item-action">
                                            <i class="icon-file-pdf mr-3"></i>
                                            {{str_limit($document->file_name, 15 , '...')}} <span
                                                class="badge badge-success ml-2 mr-2">{{$document->human_readable_size}}</span>
                                            <span class="icon-download ml-2"></span>
                                        </a>
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/tables/datatables/extensions/responsive.min.js') }}"></script>

    @include('_partials.datatable')

    <script>
        $(document).ready(function () {
            $('#table').dataTable({
                ajax: $.fn.dataTable.pipeline({
                    url: '{!! route('upcomingEvents.datatable') !!}',
                    pages: 5
                }),
                columns: [
                    {data: 'name', name: 'name', "defaultContent": "<i>Not set</i>"},
                    {data: 'venue', name: 'venue', "defaultContent": "<i>Not set</i>"},
                    {data: 'department.name', name: 'department.name', "defaultContent": "<i>Not set</i>"},

                ],
            });


        });

    </script>


@stop
