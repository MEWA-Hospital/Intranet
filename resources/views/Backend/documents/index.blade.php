@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Department details  @stop
@section('page-header') Departments @stop
@section('page-header-desc') / department details @stop
@section('content')
    <div class="card">
        <table class="table table-border-dashed text-nowrap table-customers" id="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Uploaded</th>
                <th>Uploaded by</th>
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
                    url: '{!! route('admin.documents.datatable') !!}',
                    pages: 5
                }),
                columns: [
                    {data: 'name', name: 'name', "defaultContent": "<i>Not set</i>"},
                    {data: 'created_at', name: 'created_at', "defaultContent": "<i>Not set</i>"},
                    {data: 'user.username', name: 'user.username', "defaultContent": "<i>Not set</i>"},
                    {data: 'action', name: 'action'},
                ]
            });
        });

    </script>


@stop
