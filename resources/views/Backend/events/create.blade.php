@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Create Event @stop
@section('page-header') Events @stop
@section('page-header-desc') Add Event @stop
@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-12 offset-lg-3">
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
            <form class="card" action="{{ route('events.store') }}" method="post">
                <div class="card-body">
                    {{ csrf_field() }}

                    @include('Backend.events.form',[
                    'event' => new App\Models\Events(),
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

    {!! JsValidator::formRequest('App\Http\Requests\UserCreateRequest') !!}
@stop
