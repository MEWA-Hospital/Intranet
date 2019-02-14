@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Create Event @stop
@section('page-header') Memos @stop
@section('page-header-desc') / create Memo @stop
@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3 ">
            <create_memo action="{{ route('admin.memos.store') }}" method="post" :departments="{{$departments}}"></create_memo>
        </div>
    </div>

@stop
