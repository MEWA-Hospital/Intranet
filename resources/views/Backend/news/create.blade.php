@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Create article @stop
@section('page-header') NEWS @stop
@section('page-header-desc') create an article  @stop
@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-12 offset-lg-2">
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
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    <script type="text/javascript" src="{{ url('global_assets/js/plugins/editors/ckeditor/ckeditor.js')}}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>

    <script>
        $('select').select2();
        // CKEDITOR.config.toolbar = [
        //     ['Styles','Format','Font','FontSize', 'Bold','Italic','Underline','StrikeThrough',
        //         '-','Undo','Redo',
        //         '-','Cut','Copy','Paste','Find','Replace',
        //         '-','Outdent','Indent',
        //         '-','Print', 'NumberedList','BulletedList',
        //         '-','Link'],
        // ] ;
        //
        // CKEDITOR.replace('body', {
        //     height: 400,
        // });

    </script>

    {!! JsValidator::formRequest('App\Http\Requests\NewsCreateRequest') !!}
@stop
