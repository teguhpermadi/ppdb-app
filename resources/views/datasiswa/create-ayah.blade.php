@extends('adminlte::page')

@section('plugins.TempusDominusBs4', true)
@section('plugins.Select2', true)
@section('title', 'Dashboard')

@section('content_header')
    <h1>Formulir Data Identitas Ayah</h1>
@stop

@section('content')
    {{-- @livewire('datasiswa.ayah') --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('datasiswa.ayahStore')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="card">
        <div class="card-header">
            Identias Ayah
        </div>
        <div class="card-body">
            <x-adminlte-select name="status_ayah" label="{{ Str::headline('status_ayah') }}" enable-old-support>
                <x-adminlte-options :options="$opt_status" :selected="$data->status_ayah" empty-option="Pilih agama"/>
            </x-adminlte-select>

            <x-adminlte-input value="{{ $data->nik_ayah}}" name="nik_ayah" label="{{ Str::headline('nik_ayah') }}" enable-old-support />
            <x-adminlte-input value="{{ $data->nama_ayah}}" name="nama_ayah" label="{{ Str::headline('nama_ayah') }}" enable-old-support />
            
            <x-adminlte-select name="agama_ayah" label="{{ Str::headline('agama_ayah') }}" enable-old-support>
                <x-adminlte-options :options="$opt_agama" :selected="$data->agama_ayah" empty-option="Pilih agama"/>
            </x-adminlte-select>
            
            <x-adminlte-select name="pendidikan_ayah" label="{{ Str::headline('pendidikan_ayah') }}" enable-old-support>
                <x-adminlte-options :options="$opt_pendidikan" :selected="$data->pendidikan_ayah" empty-option="Pilih agama"/>
            </x-adminlte-select>
            
            <x-adminlte-select name="pekerjaan_ayah" label="{{ Str::headline('pekerjaan_ayah') }}" enable-old-support>
                <x-adminlte-options :options="$opt_pekerjaan" :selected="$data->pekerjaan_ayah" empty-option="Pilih agama"/>
            </x-adminlte-select>
            
            <x-adminlte-select name="penghasilan_ayah" label="{{ Str::headline('penghasilan_ayah') }}" enable-old-support>
                <x-adminlte-options :options="$opt_penghasilan" :selected="$data->penghasilan_ayah" empty-option="Pilih agama"/>
            </x-adminlte-select>
            
            <x-adminlte-input value="{{$data->telp_ayah }}" name="telp_ayah" :selected="$data->telp_ayah" label="{{ Str::headline('telp_ayah') }}" enable-old-support />

            <div class="form-group">
                <label for="">Scan KTP Ayah</label><br>
                <input type="file" name="scan_ktp_ayah">
                @if ($data->scan_ktp_ayah)
                    <a class="mb-3" href="{{ url('storage/'.$data->scan_ktp_ayah) }}" target="_blank" rel="noopener noreferrer">Pratinjau KTP Ayah</a>                    
                @endif
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
@stop