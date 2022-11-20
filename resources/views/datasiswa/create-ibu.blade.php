@extends('adminlte::page')

@section('plugins.TempusDominusBs4', true)
@section('plugins.Select2', true)
@section('title', 'Dashboard')

@section('content_header')
    <h1>Formulir Data Identitas Ibu</h1>
@stop

@section('content')
    @livewire('datasiswa.ibu')
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop