@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Edit department @stop
@section('page-header') Departments @stop
@section('page-header-desc') edit department @stop
@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2">
            @foreach($errors->all() as $error)
                {{ $error }}
            @endforeach
            <form class="card" action="{{ route('events.update', $event->id) }}" method="post">
                <div class="card-body">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="row">
    <div class="col-md-6">
        <!-- Name -->
        <div class="form-group">
            <label for="name">Name <span class="text-danger small">* (Required)</span> </label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $event->name }}">
        </div>

    </div>

    <div class="col-md-6">
        <!-- Venue-->
        <div class="form-group">
            <label for="Venue">Venue <span class="text-danger small">* (Required)</span> </label>
            <input type="text" class="form-control" name="venue" id="venue" value="{{ $event->venue }}">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">

        <!-- Start Date -->
        <div class="form-group">
            <label for="From">Start Date <span class="text-danger small">* (Required)</span></label>
            <input type="date" class="form-control" name="start_date"  value="{{ $event->start_date }}">
        </div>
    </div>

    <div class="col-md-6">

        <!-- Start Date -->
        <div class="form-group">
            <label for="From">End Date <span class="text-danger small">* (Required)</span></label>
            <input type="date" class="form-control" name="end_date"  value="{{ $event->end_date }}">
        </div>
    </div>

</div>

<!-- Description -->
<div class="form-group">
    <label for="Description">Description<span class="text-danger small">* (Required)</span> </label>
    <textarea class="form-control" name="body" id="body" rows="8">{!! $event->body !!}</textarea>
</div>

                </div>
                <div class="card-footer d-flex justify-content-between align-items-center">
            <a type="submit" class="btn btn-light btn-sm" href="{{ route('events.index')}}">Cancel</a>
            <button type="submit" class="btn bg-blue btn-sm">Submit<i class="icon-paperplane ml-2"></i></button>
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

    {!! JsValidator::formRequest('App\Http\Requests\UserUpdateRequest') !!}
@stop
