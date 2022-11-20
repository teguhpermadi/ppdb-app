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
    
@stop

@section('js')

@stop