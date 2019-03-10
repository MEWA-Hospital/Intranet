@extends('layouts.master')
@section('page-header')  Articles @stop
@section('page-header-desc')
    <small> news articles from each department</small> @stop
@section('content')

    <news-show :news="{{ $news }}"></news-show>
@stop

