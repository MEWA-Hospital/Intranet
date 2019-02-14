@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Edit news article @stop
@section('page-header') News @stop
@section('page-header-desc') edit news article @stop
@section('content')
    <div class="row">
        <div class="col-md-12">
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
            <form class="card" action="{{ route('news.update', $news->id) }}" method="post">
                <div class="card-body">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}

                    @include('Backend.news.form',[
                    'news' => $news,
                    'action' => 'Update'
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
