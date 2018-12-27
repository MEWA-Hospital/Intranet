@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Department details  @stop
@section('page-header') Departments @stop
@section('page-header-desc') department details @stop
@section('content')

    <div class="row">
        <div class="col-md-10 offset-1">
            <div class="card">
                <table class="table table-border-dashed text-nowrap table-customers" id="table">
                    <thead>
                    <tr>
                        <th>Extension</th>
                        <th>Department</th>
                        <th>Contact Person</th>
                        <th>action</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
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
                pagingType: "simple",
                ajax: $.fn.dataTable.pipeline({
                    url: '{!! route('admin.extensions.datatable') !!}',
                    pages: 5,
                }),
                columns: [
                    {data: 'ext_no', name: 'ext_no', "defaultContent": "<i>Not set</i>"},
                    {data: 'department.name', name: 'department.name', "defaultContent": "<i>Not set</i>"},
                    {data: 'employees', name: 'employees', "defaultContent": "<i>Not set</i>"},

                    {data: 'action', name: 'action'},
                ]
            });
        });

    </script>


@stop
