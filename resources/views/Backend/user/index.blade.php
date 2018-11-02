@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Users details  @stop
@section('page-header') Users @stop
@section('page-header-desc') user account details @stop
@section('content')
    <div class="card">
        <div class="card-body pt-5">
            <table class="table table-condensed" id="table">
                <thead>
                <tr>
                    <th>Full name</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Telephone</th>
                    <th>action</th>
                    {{--<th>slack web_hook</th>--}}
                    {{--<th class="text-center">Actions</th>--}}
                </tr>
                </thead>
            </table>

        </div>
    </div>
@stop

@section('js')
    <script src="{{ asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
{{--    <script src="{{ asset('global_assets/js/demo_pages/datatables_basic.js') }}"></script>--}}

    @include('_partials.datatable')

    <script>
        $('#table').dataTable({
            pagingType: "simple",
            ajax: $.fn.dataTable.pipeline({
                url: '{!! route('users.datatable') !!}',
                pages: 5
            }),
            columns: [
                {data: 'first_name', name: 'first_name'},
                {data: 'department.name', name: 'name'},
                {data: 'designation', name: 'designation'},
                {data: 'telephone', name: 'telephone'},
                {data: 'action', name: 'action'},
            ]
        });

    </script>


@stop
