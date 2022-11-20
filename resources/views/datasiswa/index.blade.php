@extends('adminlte::page')

@section('plugins.TempusDominusBs4', true)

@section('title', 'Dashboard')

@section('content_header')
    <h1>Formulir PPDB</h1>
@stop

@section('content')
    @livewire('datasiswa.check', ['id' => auth()->user()->id])
@stop

@section('css')
    <link rel="stylesheet" href="/css/uk-timeline.css">
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/uikit@3.4.2/dist/css/uikit.min.css'><link rel="stylesheet" href="./style.css">
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
    <script src='https://cdn.jsdelivr.net/npm/uikit@3.4.2/dist/js/uikit.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/uikit@3.4.2/dist/js/uikit-icons.min.js'></script>
@stop