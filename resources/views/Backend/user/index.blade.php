@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Users details  @stop
@section('page-header') Users @stop
@section('page-header-desc') user account details @stop
@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-condensed table-border-dashed" id="table">
                <thead>
                <tr>
                    <th>Full name</th>
                    <th>Gender</th>
                    <th>DOB</th>
                    <th>Employed</th>
                    <th>ID </th>

                    {{--<th>Designation</th>--}}
                    <th>Status</th>
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
                {data: 'username', name: 'username'},
                {data: 'employee.gender', name: 'employee.gender'},
                {data: 'employee.dob', name: 'employee.dob'},
                {data: 'employee.date_employed', name: 'employee.date_employed'},
                {data: 'employee.national_id_no', name: 'employee.date_employed'},
                {data: 'isActive', name: 'isActive'},
                {data: 'action', name: 'action'},
            ]
        });

    </script>


@stop
