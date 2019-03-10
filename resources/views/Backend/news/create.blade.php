@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Create article @stop
@section('page-header') NEWS @stop
@section('page-header-desc') / create an article  @stop
@section('content')

    <news-create action="{{ route('admin.news.store') }}"></news-create>

@stop

