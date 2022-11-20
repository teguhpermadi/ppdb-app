<?php

namespace App\Http\Livewire\Datasiswa;

use App\Models\DataSiswa;
use App\Models\JenisAgama;
use App\Models\JenisPekerjaan;
use App\Models\JenisPendidikan;
use App\Models\JenisPenghasilan;
use Livewire\Component;

class Ibu extends Component
{
    public $status_ibu;
    public $nik_ibu;
    public $nama_ibu;
    public $agama_ibu;
    public $pendidikan_ibu;
    public $pekerjaan_ibu;
    public $penghasilan_ibu;
    public $telp_ibu;
    public $opt_agama, $opt_pendidikan, $opt_pekerjaan,$opt_penghasilan;

    public function mount()
    {
        $data = DataSiswa::where('user_id', auth()->user()->id)->first();
        $this->opt_agama = JenisAgama::all()->pluck('name', 'id')->toArray();
        $this->opt_pendidikan = JenisPendidikan::all()->pluck('name', 'id')->toArray();
        $this->opt_pekerjaan = JenisPekerjaan::all()->pluck('name', 'id')->toArray();
        
        $this->opt_penghasilan = JenisPenghasilan::all()->pluck('name', 'id')->toArray();        $this->status_ibu = $data->status_ibu;
        $this->nik_ibu = $data->nik_ibu;
        $this->nama_ibu = $data->nama_ibu;
        $this->agama_ibu = $data->agama_ibu;
        $this->pendidikan_ibu = $data->pendidikan_ibu;
        $this->pekerjaan_ibu = $data->pekerjaan_ibu;
        $this->penghasilan_ibu = $data->penghasilan_ibu;
        $this->telp_ibu = $data->telp_ibu;
    }

    protected $rules = [
        'status_ibu' => 'required',
        'nik_ibu' => 'required|numeric|digits:16',
        'nama_ibu' => 'required',
        'agama_ibu' => 'required',
        'pendidikan_ibu' => 'required',
        'pekerjaan_ibu' => 'required',
        'penghasilan_ibu' => 'required',
        'telp_ibu' => 'required|phone:ID',
    ];

    protected $validationAttributes = [
        'status_ibu' => 'status ibu',
        'nik_ibu' => 'nik ibu',
        'nama_ibu' => 'nama ibu',
        'agama_ibu' => 'agama ibu',
        'pendidikan_ibu' => 'pendidikan ibu',
        'pekerjaan_ibu' => 'pekerjaan ibu',
        'penghasilan_ibu' => 'penghasilan ibu',
        'telp_ibu' => 'telp ibu',
    ];

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
        return view('livewire.datasiswa.ibu');
    }
}
