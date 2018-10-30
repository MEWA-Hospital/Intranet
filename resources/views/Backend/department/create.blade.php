@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Create department @stop
@section('page-header') Departments @stop
@section('page-header-desc') create a new department  @stop
@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-12 offset-lg-3">
            @foreach($errors->all() as $error)
                {{ $error }}
                @endforeach
            <form class="card" action="{{ route('departments.store') }}" method="post">
                <div class="card-body">
                    {{ csrf_field() }}

                    @include('Backend.department.form',[
                    'department' => new App\Models\Department,
                    'action' => 'Submit'
                    ])
                </div>

            </form>
        </div>
    </div>

@stop

@section('js')
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>

    <script>
        $('select').select2();
    </script>

    {!! JsValidator::formRequest('App\Http\Requests\DepartmentCreateRequest') !!}
@stop
