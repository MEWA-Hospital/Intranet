@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - NEWS articles  @stop
@section('page-header') NEWS @stop
@section('page-header-desc')  / published  news Articles @stop
@section('content')
    <div class="card">
        <table class="table table-border-dashed text-nowrap table-customers" id="table">
            <thead>
            <tr>
                <th>Title</th>
                <th>Department</th>
                <th>Author</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
            </thead>
        </table>

    </div>
@stop

@section('js')
    <script src="{{ asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/datatables_basic.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/tables/datatables/extensions/responsive.min.js') }}"></script>

    @include('_partials.datatable')

    <script>
        $(document).ready(function() {
            $('#table').dataTable({
                ajax: $.fn.dataTable.pipeline({
                    url: '{!! route('news.datatable') !!}',
                    pages: 5
                }),
                columns: [
                    {data: 'title', name: 'title'},
                    {data: 'department.name', name: 'department.name'},
                    {data: 'user.first_name', name: 'author.first_name'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action'},
                ]
            });
        });


    </script>


@stop
