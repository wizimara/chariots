@extends('adminlte::page')

@section('title','Dashboard')


@section('content')


@stop


@section('css')
<style>
.page.box{ padding:20px 10px 10px}
</style>
<link rel="stylesheet" href="{{asset('css/bootstrap-datepicker.min.css')}}">
<link rel="stylesheet" href="{{asset('css/bootstrap-timepicker.min.css')}}">

@stop


@section('js')
@include('shared::partials.toast')
<script src="{{asset('js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('js/bootstrap-timepicker.min.js')}}"></script>
@stop
