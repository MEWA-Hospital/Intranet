@extends('layouts.master')
@section('page-header')  Profile @stop
@section('page-header-desc')
    <small>{{$user->name}} </small>  @stop
@section('content')
    <profile :user="{{ $user }}"
             media="{{$media}}"
             :payroll="{{$payroll}}"
             :deductions="{{$deductions}}"
             picture="{{$profilePicture}}"
             :authenticated="{{auth()->user() }}"
             action="{{ route('change.password', $user->id) }}">
    </profile>
@stop

@section('js')
    <script src="{{ asset('global_assets/js/plugins/forms/styling/uniform.min.js') }}"></script>
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/0.9.0rc1/jspdf.min.js"></script>--}}
    {{--<script src="http://html2canvas.hertzen.com/dist/html2canvas.js"></script>--}}
    {{--<script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>--}}

@stop
