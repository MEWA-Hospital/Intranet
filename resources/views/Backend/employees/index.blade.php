@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Employees details  @stop
@section('page-header') EMPLOYEES @stop
@section('page-header-desc') / employees details @stop
@section('content')
    <div class="card">
        <table class="table table-border-dashed text-nowrap table-customers" id="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Gender</th>
                <th>ID No.</th>
                <th>Department</th>
                <th>Designation</th>
                <th>Type</th>
                <th>Email</th>
                <th>Staff No.</th>
                <th>KRA</th>
                <th>NHIF</th>
                <th>NSSF</th>
                <th>Employed</th>
                <th>Address</th>
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
                    url: '{!! route('admin.employees.datatable') !!}',
                    pages: 5
                }),
                columns: [
                    {data: 'name', name: 'name', "defaultContent": "<i>Not set</i>"},
                    {data: 'gender', name: 'gender', "defaultContent": "<i>Not set</i>"},
                    {data: 'national_id_no', name: 'national_id_no', "defaultContent": "<i>Not set</i>"},
                    {data: 'department.name', name: 'department.name', "defaultContent": "<i>Not set</i>"},
                    {data: 'designation', name: 'designation', "defaultContent": "<i>Not set</i>"},
                    {data: 'type.name', name: 'type.name', "defaultContent": "<i>Not set</i>"},
                    {data: 'email.email', name: 'email.email', "defaultContent": "<i>Not set</i>"},
                    {data: 'staff_no', name: 'staff_no', "defaultContent": "<i>Not set</i>"},
                    {data: 'kra_pin', name: 'kra_pin', "defaultContent": "<i>Not set</i>"},
                    {data: 'nhif_no', name: 'nhif_no', "defaultContent": "<i>Not set</i>"},
                    {data: 'nssf_no', name: 'nssf_no', "defaultContent": "<i>Not set</i>"},
                    {data: 'date_employed', name: 'date_employed', "defaultContent": "<i>Not set</i>"},
                    {data: 'physical_address', name: 'physical_address', "defaultContent": "<i>Not set</i>"},
                    {data: 'action', name: 'action'},
                ],
            });


        });

    </script>


@stop
