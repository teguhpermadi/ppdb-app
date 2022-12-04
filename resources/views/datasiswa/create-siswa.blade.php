@extends('adminlte::page')

@section('plugins.TempusDominusBs4', true)
@section('plugins.BsCustomFileInput', true)
@section('title', 'Dashboard')

@section('content_header')
    <h1>Formulir Data Siswa</h1>
@stop

@section('content')
    {{-- @livewire('datasiswa.siswa') --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('datasiswa.siswaStore') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-header">
                Identitas Calon Siswa
            </div>
            <div class="card-body">
                <x-adminlte-input value="{{ $data->nama_lengkap }}" name="nama_lengkap" label="{{ Str::headline('nama_lengkap') }}"
                enable-old-support />
                <x-adminlte-input value="{{ $data->nama_panggilan }}" name="nama_panggilan" label="{{ Str::headline('nama_panggilan') }}" enable-old-support />
                <x-adminlte-input value="{{ $data->tempat_lahir }}" name="tempat_lahir" label="{{ Str::headline('tempat_lahir') }}" enable-old-support />
                <div class="form-group">
                    <label for="">Tanggal Lahir</label>
                    <input type="text" value="{{ $data->tanggal_lahir }}" name="tanggal_lahir" id="tanggal_lahir" class="form-control">
                </div>
                <x-adminlte-input value="{{ $data->nik }}" name="nik" label="{{ Str::headline('nik') }}" enable-old-support />
                <x-adminlte-input value="{{ $data->nkk }}" name="nkk" label="{{ Str::headline('nkk') }}" enable-old-support />
                <x-adminlte-input value="{{ $data->nisn }}" name="nisn" label="{{ Str::headline('nisn') }}" enable-old-support />
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Alamat
            </div>
            <div class="card-body">
                @livewire('indonesia', ['selectedVillage' => $data->village_id])
                <x-adminlte-input value="{{ $data->alamat }}" name="alamat" label="{{ Str::headline('alamat') }}" enable-old-support />
                <x-adminlte-input value="{{ $data->kodepos }}" name="kodepos" label="{{ Str::headline('kodepos') }}" enable-old-support />
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Unggah Berkas Pendukung
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Scan akta lahir</label><br>
                    <input type="file" name="scan_akta" >
                    @if ($data->scan_akta)
                        <a class="mb-3" href="{{ url('storage/'.$data->scan_akta) }}" target="_blank" rel="noopener noreferrer">Pratinjau Akta Lahir</a>
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Scan kartu keluarga</label><br>
                    <input type="file" name="scan_kartu_keluarga">
                    @if ($data->scan_kartu_keluarga)
                        <a class="mb-3" href="{{ url('storage/'.$data->scan_kartu_keluarga) }}" target="_blank" rel="noopener noreferrer">Pratinjau Kartu Keluarga</a>                    
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Scan surat keterangan</label><br>
                    <input type="file" name="scan_surat">
                    @if ($data->scan_surat)
                        <a class="mb-3" href="{{ url('storage/'.$data->scan_surat) }}" target="_blank" rel="noopener noreferrer">Pratinjau Surat</a>                    
                    @endif
                </div>
                <div class="form-group">
                    <label for="">Scan ijazah</label><br>
                    <input type="file" name="scan_ijazah">
                    @if ($data->scan_ijazah)
                        <a class="mb-3" href="{{ url('storage/'.$data->scan_ijazah) }}" target="_blank" rel="noopener noreferrer">Pratinjau Kartu Keluarga</a>                    
                    @endif
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Simpan</button>
    </form>
@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
@stop

@section('js')
    {{-- <script> console.log('Hi!'); </script> --}}
    <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
    <script>
        var picker = new Pikaday({ 
            field: document.getElementById('tanggal_lahir') ,
            format: 'DD/MM/YYYY'
        });
    </script>
@stop