
@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} Events | Hospital Calender  @stop
@section('page-header') Events - Calendar @stop
@section('page-header-desc') details about events @stop
@section('content')
    <div class="card">
        <div class="card-body pt-5">
            <table class="table table-condensed table-border-dashed" id="table">
                <thead>
                <tr>
                    <th>Date</th>
                    <th>From</th>
                    <th>Subject</th>
                    <th>Created</th>
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
                url: '{!! route('admin.memos.datatable') !!}',
                pages: 5
            }),
            columns: [
                {data: 'date', name: 'date'},
                {data: 'from', name: 'from'},
                {data: 'subject', name: 'subject'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action'},
            ]
        });

    </script>


@stop
