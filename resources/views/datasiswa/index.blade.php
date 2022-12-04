@extends('adminlte::page')

@section('plugins.TempusDominusBs4', true)

@section('title', 'Dashboard')

@section('content_header')
    <h1>Formulir PPDB</h1>
@stop

@section('content')
    {{-- @livewire('datasiswa.check', ['id' => auth()->user()->id]) --}}
    <div class="row">
        <div class="col-md-12">
          <!-- The time line -->
          <div class="timeline">
            <!-- timeline time label -->
            <div class="time-label">
              <span class="bg-warning p-3">Isi Formulir Pendaftaran</span>
            </div>
            <!-- /.timeline-label -->
            <!-- timeline item -->
            <div>
                @if ($dataSiswa)
                    <i class="fas fa-check bg-blue"></i>
                @else
                    <i class="fas fa-times bg-red"></i>
                @endif
              <div class="timeline-item">
                {{-- <span class="time"><i class="fas fa-clock"></i> 12:05</span> --}}
                <h3 class="timeline-header">Data Calon Siswa
                    @if ($dataSiswa)
                        <span class="float-right badge badge-primary">Sudah Lengkap</span>
                    @else
                        <span class="float-right badge badge-warning">Belum Lengkap</span>
                    @endif
                </h3>
                <div class="timeline-body">
                        Data siswa yang harus diisi meliputi:
                        <ol>
                            <li>nama lengkap calon siswa</li>
                            <li>nama panggilan</li>
                            <li>tempat lahir</li>
                            <li>tanggal lahir</li>
                            <li>alamat</li>
                            <li>nomor induk kependudukan</li>
                            <li>nomor kartu keluarga</li>
                            <li>nomor induk siswa nasional</li>
                            <li>scan akta lahir</li>
                            <li>scan kartu keluarga</li>
                        </ol>
                </div>
                <div class="timeline-footer">
                    <a href="{{ route('datasiswa.siswaCreate') }}" class="btn btn-primary btn-sm mt-3">Data Siswa</a>
                </div>
              </div>
            </div>
            <!-- END timeline item -->
            <!-- timeline item -->
            <div>
                @if ($dataAyah)
                    <i class="fas fa-check bg-blue"></i>
                @else
                    <i class="fas fa-times bg-red"></i>
                @endif
              <div class="timeline-item">
                {{-- <span class="time"><i class="fas fa-clock"></i> 5 mins ago</span> --}}
                <h3 class="timeline-header">Data Identitas Ayah
                    @if ($dataAyah)
                        <span class="float-right badge badge-primary">Sudah Lengkap</span>
                    @else
                        <span class="float-right badge badge-warning">Belum Lengkap</span>
                    @endif
                </h3>
                <div class="timeline-body">
                    Data ayah yang harus diisi meliputi:
                    <ol>
                        <li>nama lengkap ayah</li>
                        <li>agama ayah</li>
                        <li>pekerjaan ayah</li>
                        <li>penghasilan ayah</li>
                        <li>status ayah</li>
                        <li>nomor induk kependudukan</li>
                        <li>scan KTP ayah</li>
                    </ol>
            </div>
            <div class="timeline-footer">
                <a href="{{ route('datasiswa.ayahCreate') }}" class="btn btn-primary btn-sm mt-3">Data Ayah</a>
            </div>
              </div>
            </div>
            <!-- END timeline item -->
            <!-- timeline item -->
            <div>
                @if ($dataIbu)
                    <i class="fas fa-check bg-blue"></i>
                @else
                    <i class="fas fa-times bg-red"></i>
                @endif
              <div class="timeline-item">
                {{-- <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span> --}}
                <h3 class="timeline-header">Data Identitas Ibu
                    @if ($dataIbu)
                        <span class="float-right badge badge-primary">Sudah Lengkap</span>
                    @else
                        <span class="float-right badge badge-warning">Belum Lengkap</span>
                    @endif
                </h3>
                <div class="timeline-body">
                    Data ibu yang harus diisi meliputi:
                    <ol>
                        <li>nama lengkap ibu</li>
                        <li>agama ibu</li>
                        <li>pekerjaan ibu</li>
                        <li>penghasilan ibu</li>
                        <li>status ibu</li>
                        <li>nomor induk kependudukan</li>
                        <li>scan KTP ibu</li>
                    </ol>
                </div>
                <div class="timeline-footer">
                    <a href="{{ route('datasiswa.ibuCreate') }}" class="btn btn-primary btn-sm mt-3">Data Ibu</a>
                </div>
              </div>
            </div>
            <!-- END timeline item -->
            <!-- timeline item -->
            <div>
                @if ($dataWali)
                    <i class="fas fa-check bg-blue"></i>
                @else
                    <i class="fas fa-times bg-red"></i>
                @endif
              <div class="timeline-item">
                {{-- <span class="time"><i class="fas fa-clock"></i> 27 mins ago</span> --}}
                <h3 class="timeline-header">Data Identitas Wali
                    @if ($dataWali)
                        <span class="float-right badge badge-primary">Sudah Lengkap</span>
                    @else
                        <span class="float-right badge badge-warning">Tidak Wajib</span>
                    @endif
                </h3>
                <div class="timeline-body">
                    Data wali yang harus diisi meliputi:
                    <ol>
                        <li>hubungan wali</li>
                        <li>nama lengkap wali</li>
                        <li>agama wali</li>
                        <li>pekerjaan wali</li>
                        <li>penghasilan wali</li>
                        <li>nomor induk kependudukan</li>
                        <li>scan KTP wali</li>
                    </ol>
                </div>
                <div class="timeline-footer">
                    <a href="{{ route('datasiswa.waliCreate') }}" class="btn btn-primary btn-sm mt-3">Data Wali</a>
                </div>
              </div>
            </div>
            <!-- END timeline item -->
            <!-- timeline time label -->
            <div class="time-label">
              <span class="bg-warning p-3">Verifikasi Data</span>
            </div>
          </div>
        </div>
        <!-- /.col -->
      </div>
@stop

@section('css')
    
@stop

@section('js')

@stop