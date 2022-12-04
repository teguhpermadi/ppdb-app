<?php

namespace App\Http\Livewire\Datasiswa;

use App\Models\DataSiswa;
use Livewire\Component;
use Illuminate\Support\Arr;

class Check extends Component
{
    public $data;
    public $dataSiswa;
    public $dataAyah;
    public $dataIbu;
    public $dataWali;

    public function mount($id)
    {
        $data = DataSiswa::where('user_id', $id)->first();
        
        if(Arr::has($data, ['nama_lengkap', 'nama_panggilan', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'village_id', 'kodepos', 'nik', 'nkk', 'nisn']))
        {
            $this->dataSiswa = true;
        }

        if(Arr::has($data, ['status_ayah', 'nik_ayah', 'nama_ayah', 'agama_ayah', 'pekerjaan_ayah', 'penghasilan_ayah', 'telp_ayah']))
        {
            $this->dataAyah = true;
        }
        
        if(Arr::has($data, ['status_ibu', 'nik_ibu', 'nama_ibu', 'agama_ibu', 'pekerjaan_ibu', 'penghasilan_ibu', 'telp_ibu']))
        {
            $this->dataIbu = true;
        }
        
        if(Arr::has($data, ['hubungan_wali', 'nik_wali', 'nama_wali', 'agama_wali', 'pekerjaan_wali', 'penghasilan_wali', 'telp_wali']))
        {
            $this->dataWali = true;
        }
    }

    public function render()
    {
        return view('livewire.datasiswa.check');
    }
}
