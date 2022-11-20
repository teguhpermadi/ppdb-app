<div>
    {{-- In work, do what you enjoy. --}}
    <div class="uk-container uk-padding">
        <div class="uk-timeline">
            <div class="uk-timeline-item">
                <div class="uk-timeline-icon">
                    @if ($dataSiswa)
                        <span class="uk-badge"><span uk-icon="check"></span></span>
                    @else
                        <span class="uk-badge" style="background-color: red"><span uk-icon="close"></span></span>
                    @endif
                </div>
                <div class="uk-timeline-content">
                    <div class="uk-card uk-card-default uk-margin-medium-bottom uk-overflow-auto">
                        <div class="uk-card-header">
                            <div class="uk-grid-small uk-flex-middle" uk-grid>
                                <h3 class="uk-card-title">Data Siswa</h3>
                            </div>
                        </div>
                        <div class="uk-card-body">
                            <p>
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
                                Lengkapi data siswa dengan klik tombol berikut <br>
                                <a href="{{ route('datasiswa.create', ['param' => 'siswa']) }}" class="btn btn-primary btn-sm mt-3">Data Siswa</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="uk-timeline-item">
                <div class="uk-timeline-icon">
                    @if ($dataAyah)
                        <span class="uk-badge"><span uk-icon="check"></span></span>
                    @else
                        <span class="uk-badge" style="background-color: red"><span uk-icon="close"></span></span>
                    @endif
                </div>
                <div class="uk-timeline-content">
                    <div class="uk-card uk-card-default uk-margin-medium-bottom uk-overflow-auto">
                        <div class="uk-card-header">
                            <div class="uk-grid-small uk-flex-middle" uk-grid>
                                <h3 class="uk-card-title">Data Ayah</h3>
                            </div>
                        </div>
                        <div class="uk-card-body">
                            <p>
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
                                Lengkapi data ayah dengan klik tombol berikut <br>
                                <a href="{{ route('datasiswa.create', ['param' => 'ayah']) }}" class="btn btn-primary btn-sm mt-3">Data Ayah</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
                    <div class="uk-timeline-item">
                <div class="uk-timeline-icon">
                    @if ($dataIbu)
                        <span class="uk-badge"><span uk-icon="check"></span></span>
                    @else
                        <span class="uk-badge" style="background-color: red"><span uk-icon="close"></span></span>
                    @endif
                </div>
                <div class="uk-timeline-content">
                    <div class="uk-card uk-card-default uk-margin-medium-bottom uk-overflow-auto">
                        <div class="uk-card-header">
                            <div class="uk-grid-small uk-flex-middle" uk-grid>
                                <h3 class="uk-card-title">Data Ibu</h3>
                            </div>
                        </div>
                        <div class="uk-card-body">
                            <p>
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
                            </p>Lengkapi data Ibu dengan klik tombol berikut <br>
                            <a href="http://" class="btn btn-primary btn-sm mt-3">Data Ibu</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>