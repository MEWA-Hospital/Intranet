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
    <!-- Laravel Javascript Validation -->
    <script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
    <script src="{{ asset('global_assets/js/plugins/forms/selects/select2.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/plugins/editors/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('global_assets/js/demo_pages/editor_summernote.js') }}"></script>

    <script>
        $('select').select2();
    </script>

    {!! JsValidator::formRequest('App\Http\Requests\NewsUpdateRequest') !!}
@stop