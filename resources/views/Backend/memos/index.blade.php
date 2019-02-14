@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Memos @stop
@section('page-header') Memos @stop
@section('page-header-desc')  / details of created memos @stop
@section('content')

    <div class="card">
        <table class="table table-border-dashed text-nowrap table-customers" id="table">
            <thead>
            <tr>
                <th>Date</th>
                <th>From</th>
                <th>Subject</th>
                <th>Created</th>
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
                    url: '{!! route('admin.memos.datatable') !!}',
                    pages: 5
                }),
                columns: [
                    {data: 'date', name: 'date', "defaultContent": "<i>Not set</i>"},
                    {data: 'from', name: 'from', "defaultContent": "<i>Not set</i>"},
                    {data: 'subject', name: 'subject', "defaultContent": "<i>Not set</i>"},
                    {data: 'created_at', name: 'created_at', "defaultContent": "<i>Not set</i>"},
                    {data: 'action', name: 'action'},
                ]
            });
        });


    </script>


@stop
