@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Users details  @stop
@section('page-header') USERS  @stop
@section('page-header-desc') / account details @stop
@section('content')
    <div class="card">
        <table class="table table-striped text-nowrap table-customers" id="table">
            <thead>
            <tr>
                <th>Full name</th>
                <th>Gender</th>
                <th>Department</th>
                <th>Employed</th>
                <th>ID</th>
                <th>Status</th>
                <th>action</th>
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
                    url: '{!! route('admin.users.datatable') !!}',
                    pages: 5
                }),
                columns: [
                    {data: 'username', name: 'username', "defaultContent": "<i>Not set</i>"},
                    {data: 'employee.gender', name: 'employee.gender', "defaultContent": "<i>Not set</i>"},
                    {data: 'employee.department.name', name: 'employee.department.name', "defaultContent": "<i>Not set</i>"},
                    {data: 'employee.date_employed', name: 'employee.date_employed', "defaultContent": "<i>Not set</i>"},
                    {data: 'employee.national_id_no', name: 'employee.date_employed', "defaultContent": "<i>Not set</i>"},
                    {data: 'isActive', name: 'isActive'},
                    {data: 'action', name: 'action'},
                ]
            })
        });


    </script>


@stop
