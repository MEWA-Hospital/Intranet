@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Department details  @stop
@section('page-header') Departments @stop
@section('page-header-desc') department details @stop
@section('content')
    <div class="card">
        <div class="card-body pt-5">
            <table class="table table-condensed" id="table">
                <thead>
                <tr>
                    <th>Department name</th>
                    <th>Members </th>
                    <th>Dept. email </th>
                    <th>Dept. mailing email</th>
                    <th>action</th>
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
                url: '{!! route('admin.departments.datatable') !!}',
                pages: 5
            }),
            columns: [
                {data: 'name', name: 'name'},
                {data: 'members_count', name: 'members_count'},
                {data: 'email', name: 'email'},
                {data: 'mailing_list', name: 'mailing_list'},
                {data: 'action', name: 'action'},
            ]
        });

    </script>


@stop
