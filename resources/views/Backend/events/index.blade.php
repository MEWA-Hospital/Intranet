@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} Events | Hospital Calender  @stop
@section('page-header') Events - Calendar @stop
@section('page-header-desc') details about events @stop
@section('content')
    <div class="card">
        <div class="card-body pt-5">
            <table class="table table-condensed" id="table">
                <thead>
                <tr>
                    <th>Name</th>
                    {{--<th>Description</th>--}}
                    <th>Venue</th>
                    <th>User</th>
                    <th>Department</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th class="text-center">Actions</th>
                </tr>
                </thead>
            </table>

        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
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
                {data: 'name', name: 'name'},
                // {data: 'body', name: 'body'},
                {data: 'venue', name: 'venue'},
                {data: 'user.username', name: 'user.username'},
                {data: 'department_id', name: 'department_id'},
                {data: 'start_date', name: 'start_date'},
                {data: 'end_date', name: 'end_date'},
                {data: 'action', name: 'action'},
            ]
        });

    </script>


@stop
