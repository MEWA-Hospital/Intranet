@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Create article @stop
@section('page-header') NEWS @stop
@section('page-header-desc') create an article  @stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            @foreach($errors->all() as $error)
                {{ $error }}
                @endforeach
            <form class="card" action="{{ route('news.store') }}" method="post">
                <div class="card-body">
                    {{ csrf_field() }}

                    @include('Backend.news.form',[
                    'news' => new App\Models\News,
                    'action' => 'Submit'
                    ])
                </div>

            </form>
        </div>
    </div>

@stop

@section('js')
    <script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
@stop

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.0.0/trix.css">
@stop
