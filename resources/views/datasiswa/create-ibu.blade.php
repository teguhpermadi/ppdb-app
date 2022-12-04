@extends('adminlte::page')

@section('plugins.TempusDominusBs4', true)
@section('plugins.Select2', true)
@section('title', 'Dashboard')

@section('content_header')
    <h1>Formulir Data Identitas Ibu</h1>
@stop

@section('content')
    {{-- @livewire('datasiswa.ibu') --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('datasiswa.ibuStore')}}" method="post" enctype="multipart/form-data">
        @csrf
    <div class="card">
        <div class="card-header">
            Identias ibu
        </div>
        <div class="card-body">
            <x-adminlte-select name="status_ibu" label="{{ Str::headline('status_ibu') }}" enable-old-support>
                <x-adminlte-options :options="$opt_status" :selected="$data->status_ibu" empty-option="Pilih status"/>
            </x-adminlte-select>

            <x-adminlte-input value="{{ $data->nik_ibu}}" name="nik_ibu" label="{{ Str::headline('nik_ibu') }}" enable-old-support />
            <x-adminlte-input value="{{ $data->nama_ibu}}" name="nama_ibu" label="{{ Str::headline('nama_ibu') }}" enable-old-support />
            
            <x-adminlte-select name="agama_ibu" label="{{ Str::headline('agama_ibu') }}" enable-old-support>
                <x-adminlte-options :options="$opt_agama" :selected="$data->agama_ibu" empty-option="Pilih agama"/>
            </x-adminlte-select>
            
            <x-adminlte-select name="pendidikan_ibu" label="{{ Str::headline('pendidikan_ibu') }}" enable-old-support>
                <x-adminlte-options :options="$opt_pendidikan" :selected="$data->pendidikan_ibu" empty-option="Pilih agama"/>
            </x-adminlte-select>
            
            <x-adminlte-select name="pekerjaan_ibu" label="{{ Str::headline('pekerjaan_ibu') }}" enable-old-support>
                <x-adminlte-options :options="$opt_pekerjaan" :selected="$data->pekerjaan_ibu" empty-option="Pilih agama"/>
            </x-adminlte-select>
            
            <x-adminlte-select name="penghasilan_ibu" label="{{ Str::headline('penghasilan_ibu') }}" enable-old-support>
                <x-adminlte-options :options="$opt_penghasilan" :selected="$data->penghasilan_ibu" empty-option="Pilih agama"/>
            </x-adminlte-select>
            
            <x-adminlte-input value="{{$data->telp_ibu }}" name="telp_ibu" :selected="$data->telp_ibu" label="{{ Str::headline('telp_ibu') }}" enable-old-support />

            <div class="form-group">
                <label for="">Scan KTP ibu</label><br>
                <input type="file" name="scan_ktp_ibu">
                @if ($data->scan_ktp_ibu)
                    <a class="mb-3" href="{{ url('storage/'.$data->scan_ktp_ibu) }}" target="_blank" rel="noopener noreferrer">Pratinjau KTP ibu</a>                    
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