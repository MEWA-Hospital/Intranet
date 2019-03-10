@extends('layouts.master')
@section('page-title' ) {{ str_replace('-', ' ', config('app.name')) }} - Edit news article @stop
@section('page-header') News @stop
@section('page-header-desc') edit news article @stop
@section('content')

    <news-edit
        action="{{ route('admin.news.update', $news->id) }}"
        :news="{{ $news }}">
    </news-edit>

@stop


