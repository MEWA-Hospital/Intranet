@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Edit | Food @stop
@section('page-header') Foods @stop
@section('page-header-desc') Edit Food @stop
@section('content')
    <div class="row">
        <div class="col-lg-6 col-md-12 offset-lg-3">
            @foreach($errors->all() as $error)
                {{ $error }}
                @endforeach
            <form class="card" action="{{ route('foods.update', $food->id) }}" method="post">
                <div class="card-body">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    @include('Backend.foods.form',[
                    'foods' => $food,
                    'action' => 'Update'
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

    {!! JsValidator::formRequest('App\Http\Requests\FoodUpdateRequest') !!}
@stop
