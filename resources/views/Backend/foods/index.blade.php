@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} Food | Catering Department  @stop
@section('page-header') Catering Department   --  Foods @stop
@section('page-header-desc') <hr> Welcome to the Food Corner | Quick way to add, edit, update and delete
food in the database.@stop
@section('content')
    <div class="card">
        <div class="card-body pt-5">
            <table class="table table-condensed" id="table">
                <thead>
                <tr>
                    <th>Food Name</th>
                    <th>Food Description</th>
                    <th>Food Category</th>
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
                url: '{!! route('foods.datatable') !!}',
                pages: 5
            }),
            columns: [
                {data: 'name', name: 'name'},
                {data: 'description', name: 'description'},
                {data: 'food_group', name: 'food_group'},
                {data: 'action', name: 'action'},
            ]
        });

    </script>

@stop