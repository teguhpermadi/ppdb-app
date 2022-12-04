<div>
    {{-- A good traveler has no fixed plans and is not intent upon arriving. --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form wire:submit.prevent="save">
        <input type="hidden" wire:model="user_id">
        <div class="card card-info">
            <div class="card-header">
                Identitas Calon siswa
            </div>
            <div class="card-body">
                <x-adminlte-input wire:model="nama_lengkap" name="nama_lengkap" label="{{ Str::headline('nama_lengkap') }}"
                    enable-old-support />
                <x-adminlte-input wire:model="nama_panggilan" name="nama_panggilan"
                    label="{{ Str::headline('nama_panggilan') }}" enable-old-support />
                <x-adminlte-input wire:model="tempat_lahir" name="tempat_lahir"
                    label="{{ Str::headline('tempat_lahir') }}" enable-old-support />
                    <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input type="text" wire:model.lazy="tanggal_lahir" id="tanggal_lahir" class="form-control">
                    </div>
                <x-adminlte-input wire:model="nik" name="nik" label="{{ Str::headline('nik') }}"
                    enable-old-support />
                <x-adminlte-input wire:model="nkk" name="nkk" label="{{ Str::headline('nkk') }}"
                    enable-old-support />
                <x-adminlte-input wire:model="nisn" name="nisn" label="{{ Str::headline('nisn') }}"
                    enable-old-support />
                
            </div>
        </div>

        <div class="card card-info">
            <div class="card-header">
                Alamat
            </div>
            <div class="card-body">
                <x-adminlte-input wire:model="alamat" name="alamat" label="{{ Str::headline('alamat') }}"
                    enable-old-support />
                <x-adminlte-select label="Provinsi" wire:model="selectedProvince" name="provinsi_id">
                    <x-adminlte-options :options="$provinces" empty-option="Pilih Provinsi" />
                </x-adminlte-select>

                <x-adminlte-select label="Kota/Kabupaten" wire:model="selectedCity" name="kota_id">
                    <x-adminlte-options :options="$cities" empty-option="Pilih Kota/Kabupaten" />
                </x-adminlte-select>

                <x-adminlte-select label="Kecamatan" wire:model="selectedDistrict" name="kecamatan_id">
                    <x-adminlte-options :options="$districts" empty-option="Pilih Kecamatan" />
                </x-adminlte-select>

                <x-adminlte-select label="Kelurahan" wire:model="selectedVillage" name="kelurahan_id">
                    <x-adminlte-options :options="$villages" empty-option="Pilih Kelurahan" />
                </x-adminlte-select>
                <x-adminlte-input wire:model="kodepos" name="kodepos" label="{{ Str::headline('kodepos') }}"
                    enable-old-support />
            </div>
        </div>
        <div class="card card-info">
            <div class="card-header">
                Unggah Dokumen
            </div>
            <div class="card-body">
                <x-adminlte-input-file name="scan_akta" wire:model="scan_akta" label="Unggah scan akta lahir" placeholder="Choose a file..."/>
                @if ($scan_akta)
                    <a class="mb-3" href="{{ url('storage/'.$scan_akta) }}" target="_blank" rel="noopener noreferrer">Pratinjau Akta Lahir</a>
                @endif
                <x-adminlte-input-file name="scan_kartu_keluarga" wire:model="scan_kartu_keluarga" label="Unggah scan kartu keluarga" placeholder="Choose a file..."/>
                @if ($scan_kartu_keluarga)
                    <a class="mb-3" href="{{ url('storage/'.$scan_kartu_keluarga) }}" target="_blank" rel="noopener noreferrer">Pratinjau Kartu Keluarga</a>                    
                @endif
                <x-adminlte-input-file name="scan_kartu_keluarga" wire:model="scan_kartu_keluarga" label="Unggah scan kartu keluarga" placeholder="Choose a file..."/>
                @if ($scan_kartu_keluarga)
                    <a class="mb-3" href="{{ url('storage/'.$scan_kartu_keluarga) }}" target="_blank" rel="noopener noreferrer">Pratinjau Kartu Keluarga</a>                    
                @endif
                <x-adminlte-input-file name="scan_surat" wire:model="scan_surat" label="Unggah scan surat" placeholder="Choose a file..."/>
                @if ($scan_surat)
                    <a class="mb-3" href="{{ url('storage/'.$scan_surat) }}" target="_blank" rel="noopener noreferrer">Pratinjau Surat</a>                    
                @endif
                <x-adminlte-input-file name="scan_ijazah" wire:model="scan_ijazah" label="Unggah scan ijazah" placeholder="Choose a file..."/>
                @if ($scan_ijazah)
                    <a class="mb-3" href="{{ url('storage/'.$scan_ijazah) }}" target="_blank" rel="noopener noreferrer">Pratinjau Kartu Keluarga</a>                    
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

