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
                Identitas Ayah
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Status Ayah</label>
                    <select wire:model="status_ayah" class="form-control">
                        <option>Pilih status</option>
                        <option value="masih hidup">Masih hidup</option>
                        <option value="sudah meninggal">Sudah meninggal</option>
                    </select>
                </div>
                <x-adminlte-input wire:model="nik_ayah" name="nik_ayah" label="{{ Str::headline('nik_ayah') }}" enable-old-support />
                <x-adminlte-input wire:model="nama_ayah" name="nama_ayah" label="{{ Str::headline('nama_ayah') }}" enable-old-support />
                <x-adminlte-select wire:model="agama_ayah" name="agama_ayah" label="{{ Str::headline('agama_ayah') }}">
                    <x-adminlte-options :options="$opt_agama"  empty-option="Pilih agama"/>
                </x-adminlte-select>
                
                <x-adminlte-select wire:model="pendidikan_ayah" name="pendidikan_ayah" label="{{ Str::headline('pendidikan_ayah') }}">
                    <x-adminlte-options :options="$opt_pendidikan"  empty-option="Pilih agama"/>
                </x-adminlte-select>
                
                <x-adminlte-select wire:model="pekerjaan_ayah" name="pekerjaan_ayah" label="{{ Str::headline('pekerjaan_ayah') }}">
                    <x-adminlte-options :options="$opt_pekerjaan"  empty-option="Pilih agama"/>
                </x-adminlte-select>
                
                <x-adminlte-select wire:model="penghasilan_ayah" name="penghasilan_ayah" label="{{ Str::headline('penghasilan_ayah') }}">
                    <x-adminlte-options :options="$opt_penghasilan"  empty-option="Pilih agama"/>
                </x-adminlte-select>
                
                <x-adminlte-input wire:model="telp_ayah" name="telp_ayah" label="{{ Str::headline('telp_ayah') }}" enable-old-support />

            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
