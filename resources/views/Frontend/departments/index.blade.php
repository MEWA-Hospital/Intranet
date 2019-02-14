@extends('layouts.master')
@section('page-header')  Departments @stop
@section('page-header-desc')
    <small> Listing of all Departments</small> @stop
@section('content')
    <div class="row">
        <div class="col-md-9">
            <div class="row">
            @foreach($departments as $department)
                <div class="col-md-4">
                    <div class="card rounded-bottom-5">
                        <div class="card-header bg-white header-elements-inline p-2">
                            <h6 class="card-title">
                                <a href="{{ route('frontend.departments.show', $department->id) }}" class="text-default">
                                    {{ $department->name }}</a>
                            </h6>
                        </div>

                        <div class="card-body">HOD:</div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-white header-elements-inline">
                    <h6 class="card-title">Upcoming Events</h6>
                    <div class="header-elements">

                    </div>
                </div>

                <div class="card-body">
                    <div class="chart mb-3" id="bullets"></div>

                    <ul class="media-list">
                        <li class="media">
                            <div class="mr-3">
                                <a href="#"
                                   class="btn bg-transparent border-pink text-pink rounded-round border-2 btn-icon"><i
                                        class="icon-calendar"></i></a>
                            </div>

                            <div class="media-body">
                                Stats for July, 6:
                                <div class="text-muted">2 hours ago</div>
                            </div>

                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
@stop
