@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} Events | Hospital Calender  @stop
@section('page-header') Events - Calendar @stop
@section('page-header-desc') <hr>Events In The Hospital  @stop
@section('content')
    <div class="card">
        <div class="card-body pt-5">
            <table class="table table-condensed" id="table">
                <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Venue</th>
                    {{--<th>User</th>--}}
                    {{--<th>Associated Department</th>--}}
                    <th>Start Date</th>
                    <th>End Date</th>
                    {{--<th>slack web_hook</th>--}}
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
            </table>

        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/selects/select2.minor.js') }}"></script>
        <script src="{{ asset('global_assets/js/demo_pages/datatables_basic.js') }}"></script>

    @include('_partials.datatable')

    <script>
        $('#table').dataTable({
            pagingType: "simple",
            ajax: $.fn.dataTable.pipeline({
                url: '{!! route('events.datatable') !!}',
                pages: 5
            }),
            columns: [
                {data: 'title', name: 'title'},
                {data: 'description', name: 'description'},
                {data: 'venue', name: 'venue'},
                // {data: 'users_id', name: 'users_id'},
                // {data: 'departments_id', name: 'departments_id'},
                {data: 'start_date', name: 'start_date'},
                {data: 'end_date', name: 'end_date'},
                {data: 'action', name: 'action'},
            ]
        });

    </script>


@stop
