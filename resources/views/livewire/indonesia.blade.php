<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <x-adminlte-select label="Provinsi" wire:model="selectedProvince" name="province_id">
        <x-adminlte-options :options="$provinces" empty-option="Pilih Provinsi" />
    </x-adminlte-select>

    <x-adminlte-select label="Kota/Kabupaten" wire:model="selectedCity" name="city_id">
        <x-adminlte-options :options="$cities" empty-option="Pilih Kota/Kabupaten" />
    </x-adminlte-select>

    <x-adminlte-select label="Kecamatan" wire:model="selectedDistrict" name="district_id">
        <x-adminlte-options :options="$districts" empty-option="Pilih Kecamatan" />
    </x-adminlte-select>

    <x-adminlte-select label="Kelurahan" wire:model="selectedVillage" name="village_id">
        <x-adminlte-options :options="$villages" empty-option="Pilih Kelurahan" />
    </x-adminlte-select>
</div>
