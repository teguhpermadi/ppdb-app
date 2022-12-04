@extends('adminlte::page')

@section('plugins.TempusDominusBs4', true)
@section('plugins.Select2', true)
@section('title', 'Dashboard')

@section('content_header')
    <h1>Formulir Data Identitas Wali</h1>
@stop

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
        
    <form action="{{route('datasiswa.waliStore')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="card">
        <div class="card-header">
            Identias wali
        </div>
        <div class="card-body">
            <x-adminlte-select name="hubungan_wali" label="{{ Str::headline('hubungan_wali') }}" enable-old-support>
                <x-adminlte-options :options="$opt_hubungan" :selected="$data->hubungan_wali" empty-option="Pilih hubungan"/>
            </x-adminlte-select>

            <x-adminlte-input value="{{ $data->nik_wali}}" name="nik_wali" label="{{ Str::headline('nik_wali') }}" enable-old-support />
            <x-adminlte-input value="{{ $data->nama_wali}}" name="nama_wali" label="{{ Str::headline('nama_wali') }}" enable-old-support />
            
            <x-adminlte-select name="agama_wali" label="{{ Str::headline('agama_wali') }}" enable-old-support>
                <x-adminlte-options :options="$opt_agama" :selected="$data->agama_wali" empty-option="Pilih agama"/>
            </x-adminlte-select>
            
            <x-adminlte-select name="pendidikan_wali" label="{{ Str::headline('pendidikan_wali') }}" enable-old-support>
                <x-adminlte-options :options="$opt_pendidikan" :selected="$data->pendidikan_wali" empty-option="Pilih agama"/>
            </x-adminlte-select>
            
            <x-adminlte-select name="pekerjaan_wali" label="{{ Str::headline('pekerjaan_wali') }}" enable-old-support>
                <x-adminlte-options :options="$opt_pekerjaan" :selected="$data->pekerjaan_wali" empty-option="Pilih agama"/>
            </x-adminlte-select>
            
            <x-adminlte-select name="penghasilan_wali" label="{{ Str::headline('penghasilan_wali') }}" enable-old-support>
                <x-adminlte-options :options="$opt_penghasilan" :selected="$data->penghasilan_wali" empty-option="Pilih agama"/>
            </x-adminlte-select>
            
            <x-adminlte-input value="{{$data->telp_wali }}" name="telp_wali" :selected="$data->telp_wali" label="{{ Str::headline('telp_wali') }}" enable-old-support />

            <div class="form-group">
                <label for="">Scan KTP wali</label><br>
                <input type="file" name="scan_ktp_wali">
                @if ($data->scan_ktp_wali)
                    <a class="mb-3" href="{{ url('storage/'.$data->scan_ktp_wali) }}" target="_blank" rel="noopener noreferrer">Pratinjau KTP wali</a>                    
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