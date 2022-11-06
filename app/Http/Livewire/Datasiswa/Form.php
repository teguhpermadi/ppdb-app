<?php

namespace App\Http\Livewire\Datasiswa;

use Livewire\Component;

class Form extends Component
{
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
    public $status_ayah;
    public $nik_ayah;
    public $nama_ayah;
    public $agama_ayah;
    public $pendidikan_ayah;
    public $pekerjaan_ayah;
    public $penghasilan_ayah;
    public $telp_ayah;
    public $status_ibu;
    public $nik_ibu;
    public $nama_ibu;
    public $agama_ibu;
    public $pendidikan_ibu;
    public $pekerjaan_ibu;
    public $penghasilan_ibu;
    public $telp_ibu;
    public $hubungan_wali;
    public $nik_wali;
    public $nama_wali;
    public $agama_wali;
    public $pendidikan_wali;
    public $pekerjaan_wali;
    public $penghasilan_wali;
    public $telp_wali;

    public $provinces, $cities, $districts, $villages;

    public $selectedProvince = null;
    public $selectedCity = null;
    public $selectedDistrict = null;
    public $selectedVillage = null;

    public function mount($selectedVillage = null)
    {
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
        'status_ayah' => 'required',
        'nik_ayah' => 'required|numeric|digits:16',
        'nama_ayah' => 'required',
        'agama_ayah' => 'required',
        'pendidikan_ayah' => 'required',
        'pekerjaan_ayah' => 'required',
        'penghasilan_ayah' => 'required',
        'telp_ayah' => 'required|phone:ID',
        'status_ibu' => 'required',
        'nik_ibu' => 'required|numeric|digits:16',
        'nama_ibu' => 'required',
        'agama_ibu' => 'required',
        'pendidikan_ibu' => 'required',
        'pekerjaan_ibu' => 'required',
        'penghasilan_ibu' => 'required',
        'telp_ibu' => 'required|phone:ID',
        // 
        // 'hubungan_wali' => 'required',
        'nik_wali' => 'numeric|digits:16',
        // 'nama_wali' => 'required',
        // 'agama_wali' => 'required',
        // 'pendidikan_wali' => 'required',
        // 'pekerjaan_wali' => 'required',
        // 'penghasilan_wali' => 'numeric',
        'telp_wali' => 'phone:ID',
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
        'status_ayah' => 'status ayah',
        'nik_ayah' => 'nik ayah',
        'nama_ayah' => 'nama ayah',
        'agama_ayah' => 'agama ayah',
        'pendidikan_ayah' => 'pendidikan ayah',
        'pekerjaan_ayah' => 'pekerjaan ayah',
        'penghasilan_ayah' => 'penghasilan ayah',
        'telp_ayah' => 'telp ayah',
        'status_ibu' => 'status ibu',
        'nik_ibu' => 'nik ibu',
        'nama_ibu' => 'nama ibu',
        'agama_ibu' => 'agama ibu',
        'pendidikan_ibu' => 'pendidikan ibu',
        'pekerjaan_ibu' => 'pekerjaan ibu',
        'penghasilan_ibu' => 'penghasilan ibu',
        'telp_ibu' => 'telp ibu',
        'hubungan_wali' => 'hubungan wali',
        'nik_wali' => 'nik wali',
        'nama_wali' => 'nama wali',
        'agama_wali' => 'agama wali',
        'pendidikan_wali' => 'pendidikan wali',
        'pekerjaan_wali' => 'pekerjaan wali',
        'penghasilan_wali' => 'penghasilan wali',
        'telp_wali' => 'telp wali',
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

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
 
    public function save()
    {
        $validatedData = $this->validate();
 
        // Contact::create($validatedData);
        dd($validatedData);
    }

    public function render()
    {
        return view('livewire.datasiswa.form');
    }

}
