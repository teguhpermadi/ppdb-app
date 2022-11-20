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
                Identitas Ibu
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="">Status ibu</label>
                    <select wire:model="status_ibu" class="form-control">
                        {{-- <option>Pilih status</option> --}}
                        <option value="masih hidup">Masih hidup</option>
                        <option value="sudah meninggal">Sudah meninggal</option>
                    </select>
                </div>
                <x-adminlte-input wire:model="nik_ibu" name="nik_ibu" label="{{ Str::headline('nik_ibu') }}" enable-old-support />
                <x-adminlte-input wire:model="nama_ibu" name="nama_ibu" label="{{ Str::headline('nama_ibu') }}" enable-old-support />
                <x-adminlte-select wire:model="agama_ibu" name="agama_ibu" label="{{ Str::headline('agama_ibu') }}">
                    <x-adminlte-options :options="$opt_agama"  empty-option="Pilih agama"/>
                </x-adminlte-select>
                
                <x-adminlte-select wire:model="pendidikan_ibu" name="pendidikan_ibu" label="{{ Str::headline('pendidikan_ibu') }}">
                    <x-adminlte-options :options="$opt_pendidikan"  empty-option="Pilih agama"/>
                </x-adminlte-select>
                
                <x-adminlte-select wire:model="pekerjaan_ibu" name="pekerjaan_ibu" label="{{ Str::headline('pekerjaan_ibu') }}">
                    <x-adminlte-options :options="$opt_pekerjaan"  empty-option="Pilih agama"/>
                </x-adminlte-select>
                
                <x-adminlte-select wire:model="penghasilan_ibu" name="penghasilan_ibu" label="{{ Str::headline('penghasilan_ibu') }}">
                    <x-adminlte-options :options="$opt_penghasilan"  empty-option="Pilih agama"/>
                </x-adminlte-select>
                
                <x-adminlte-input wire:model="telp_ibu" name="telp_ibu" label="{{ Str::headline('telp_ibu') }}" enable-old-support />

            </div>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
