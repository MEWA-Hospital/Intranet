@extends('layouts.master')
@section('page-header')  Departments @stop
@section('page-header-desc')
    <small> Listing of all Departments</small> @stop
@section('content')
    <div class="col-md-9">
        @php $count = 1 @endphp
        @foreach($departments as $department)
            @if($count % 2 == 1)
                <div class="row">
                    @endif
                    <div class="col-xl-6">
                        <div class="card blog-horizontal">
                            <div class="card-body">


                                <div class="mb-3">
                                    <h5 class="d-flex font-weight-semibold flex-nowrap my-1">
                                        <a href="{{ route('frontend.departments.show', $department->id) }}" class="text-default font-info mr-2">{{ $department->name }}</a>


                                    </h5>

                                    <ul class="list-inline list-inline-dotted text-muted mb-0">
                                        <li class="list-inline-item"><i class="icon-user-tie"></i> HOD: <span
                                                    class="text-muted">Eugene Kopyov</span>
                                        </li>

                                    </ul>
                                </div>


                            </div>

                            <div class="card-footer d-sm-flex justify-content-sm-between align-items-sm-center">
                                <ul class="list-inline list-inline-dotted mb-0">
                                    <li class="list-inline-item"><i class="icon-users mr-2"></i> 382</li>
                                </ul>

                            </div>
                        </div>
                    </div>
                    @if($count%2 == 0)
                </div>
            @endif
            @php $count++ @endphp
        @endforeach
    </div>
    <div class="col-md-3"></div>
@stop
