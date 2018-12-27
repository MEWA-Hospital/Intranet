@extends('layouts.master')
@section('page-header')  People @stop
@section('page-header-desc')
    <small> People directory</small> @stop
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Employee Directory</h6>
            <div class="header-elements">
                <div class="list-icons">
                    <a class="list-icons-item" data-action="reload" id="btn-reload"></a>
                </div>
            </div>
        </div>

        <table class="table table-border-dashed text-nowrap table-customers" id="table">
            <thead>
            <tr>
                <th>Full Name</th>
                <th>Department</th>
                <th>Designation</th>
                <th>Staff no.</th>
                <th>Gender</th>
                {{--<th>Actions</th>--}}
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Full Name</th>
                <th>Department</th>
                <th>Designation</th>
                <th>Staff no.</th>
                <th>Gender</th>
            </tr>
            </tfoot>
        </table>
    </div>


@stop

@section('js')
    <script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/tables/datatables/extensions/responsive.min.js') }}"></script>

    @include('_partials.datatable')

    <script>
        $(document).ready(function () {

            let table = $('#table').dataTable({
                processing: true,
                serverSide: true,
                ajax: $.fn.dataTable.pipeline({
                    url: '{!! route('frontend.people.datatable') !!}',
                    pages: 5
                }),
                columns: [
                    {data: 'name', name: 'name', "defaultContent": "<i>Not set</i>"},
                    {data: 'department.name', name: 'department.name', "defaultContent": "<i>Not set</i>"},
                    {data: 'designation', name: 'designation', "defaultContent": "<i>Not set</i>"},
                    {data: 'staff_no', name: 'staff_no', "defaultContent": "<i>Not set</i>"},
                    {data: 'gender', name: 'gender', "defaultContent": "<i>Not set</i>"},
                ],



            });

            // create text box columns
            $('#table tfoot th').each(function () {
                let title = $('#table thead th').eq($(this).index()).text();
                $(this).html('<input type="text" class="form-control input-sm" placeholder="Search '+title+'" />');
            });

            // search the table by column
            table.api().columns().every(function () {
                let column = this;
                $(this.footer()).find('input').on('keyup change', function () {
                    column.search($(this).val()).draw();
                });
            });

            $('#btn-reload').on('click', function(){
                table.api().ajax.reload();
            });
        });

    </script>


@stop
