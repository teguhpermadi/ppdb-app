<?php

namespace App\Http\Livewire\Datasiswa;

use App\Models\DataSiswa;
use Livewire\Component;

class Siswa extends Component
{
    public $user_id;
    public $nama_lengkap;
    public $nama_panggilan;
    public $tempat_lahir;
    public $tanggal_lahir;
    public $alamat;
    public $village_id;
    public $kodepos;
    public $nik;
    public $nkk;
    public $nisn;

    public $provinces, $cities, $districts, $villages;

    public $selectedProvince = null;
    public $selectedCity = null;
    public $selectedDistrict = null;
    public $selectedVillage = null;

    public function mount($selectedVillage = null)
    {
        if(is_null($selectedVillage))
        {
            $data = DataSiswa::where('user_id', auth()->user()->id)->first();
            $selectedVillage = $data->village_id;

            $this->user_id = auth()->user()->id;
            $this->nama_lengkap = $data->nama_lengkap;
            $this->nama_panggilan = $data->nama_panggilan;
            $this->tempat_lahir = $data->tempat_lahir;
            $this->tanggal_lahir = $data->tanggal_lahir;
            $this->alamat = $data->alamat;
            $this->village_id = $data->village_id;
            $this->kodepos = $data->kodepos;
            $this->nik = $data->nik;
            $this->nkk = $data->nkk;
            $this->nisn = $data->nisn;
        }

        $provinces = \Indonesia::allProvinces();

        foreach ($provinces as $province) {
            $this->provinces[$province->id] = $province->name;
        }

        if(!is_null($selectedVillage))
        {
            $village = \Indonesia::findVillage($selectedVillage, ['district.city.province']);
            
            if($village)
            {
                // pilih provinsi
                $this->selectedProvince = $village->district->city->province->id;

                // tampilkan kota berdasarkan provinsi
                $cities = \Indonesia::findProvince($village->district->city->province->id, ['cities']);
                foreach ($cities->cities as $city) {
                    $this->cities[$city->id] = $city->name;
                }

                // pilih kota
                $this->selectedCity = $village->district->city->id;

                // tampilkan kecamatan
                $districts = \Indonesia::findCity($village->district->city->id, ['districts']);
                foreach ($districts->districts as $district) {
                    $this->districts[$district->id] = $district->name;
                }

                $this->selectedDistrict = $village->district->id;

                // tampilkan kelurahan
                $villages = \Indonesia::findDistrict($village->district->id, ['villages']);
                foreach ($villages->villages as $village) {
                    $this->villages[$village->id] = $village->name;
                }

                // pilih kelurahan
                $this->selectedVillage = $village->id;                
            }
        }
    }

    protected $rules = [
        'user_id' => 'required',
        'nama_lengkap' => 'required',
        'nama_panggilan' => 'required',
        'tempat_lahir' => 'required',
        'tanggal_lahir' => 'required|date',
        'alamat' => 'required',
        'village_id' => 'required',
        'kodepos' => 'required|postal_code:ID',
        'nik' => 'required|numeric|digits:16',
        'nkk' => 'required|numeric|digits:16',
        'nisn' => 'required|numeric|digits:10',
    ];

    protected $validationAttributes = [
        'nama_lengkap' => 'nama lengkap',
        'nama_panggilan' => 'nama panggilan',
        'tempat_lahir' => 'tempat lahir',
        'tanggal_lahir' => 'tanggal lahir',
        // 'alamat' => '',
        'village_id' => 'kelurahan',
        // 'kodepos' => '',
        'nik' => 'nomor induk kependudukan',
        'nkk' => 'nomor kartu keluarga',
        'nisn' => 'nomor induk siswa nasional',
    ];

    public function updatedSelectedProvince($province)
    {
        // dd($province);
        $this->cities = null;
        $this->districts = null; 
        $this->villages = null;
        
        $cities = \Indonesia::findProvince($province, ['cities']);
        // dd($cities);
        foreach ($cities->cities as $city) {
            $this->cities[$city->id] = $city->name;
        }

    }

    public function updatedSelectedCity($city)
    {
        $this->districts = null; 
        $this->villages = null;

        $districts = \Indonesia::findCity($city, ['districts']);
        foreach ($districts->districts as $district) {
            $this->districts[$district->id] = $district->name;
        }
    }

    public function updatedSelectedDistrict($district)
    {
        $this->villages = null;

        $villages = \Indonesia::findDistrict($district, ['villages']);
        foreach ($villages->villages as $village) {
            $this->villages[$village->id] = $village->name;
        }
    }

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    public function save()
    {
        $validatedData = $this->validate();
        // dd($validatedData);
        DataSiswa::updateOrCreate(['user_id' => auth()->user()->id], $validatedData);
        // Contact::create($validatedData);
        return to_route('datasiswa.index');
    }

    public function render()
    {
        return view('livewire.datasiswa.siswa');
    }
}
