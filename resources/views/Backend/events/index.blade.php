@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} Events | Hospital Calender  @stop
@section('page-header') Events @stop
@section('page-header-desc') / detail about events @stop
@section('content')

    <div class="card">
        <table class="table table-border-dashed text-nowrap table-customers" id="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Venue</th>

                <th>Department</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Actions</th>
            </tr>
            </thead>
        </table>
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
                    url: '{!! route('admin.events.datatable') !!}',
                    pages: 5
                }),
                columns: [
                    {data: 'name', name: 'name'},
                    // {data: 'body', name: 'body'},
                    {data: 'venue', name: 'venue', "defaultContent": "<i>Not set</i>"},
                    {data: 'department.name', name: 'department.name', "defaultContent": "<i>Not set</i>"},
                    {data: 'start_date', name: 'start_date', "defaultContent": "<i>Not set</i>"},
                    {data: 'end_date', name: 'end_date', "defaultContent": "<i>Not set</i>"},
                    {data: 'action', name: 'action'},
                ]
            });
        });

    </script>


@stop
