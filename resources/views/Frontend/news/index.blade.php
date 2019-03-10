@extends('layouts.master')
@section('page-header')  NEWS / @stop
{{--@section('page-header-desc')--}}
    {{--<small> posted news </small> @stop--}}
@section('content')

    <news-index :news="{{$news}}"></news-index>

@stop
