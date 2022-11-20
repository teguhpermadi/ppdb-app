<?php

namespace App\Http\Livewire\Datasiswa;

use App\Models\DataSiswa;
use App\Models\JenisAgama;
use App\Models\JenisPekerjaan;
use App\Models\JenisPendidikan;
use App\Models\JenisPenghasilan;
use Livewire\Component;

class Ayah extends Component
{
    public $status_ayah;
    public $nik_ayah;
    public $nama_ayah;
    public $agama_ayah;
    public $pendidikan_ayah;
    public $pekerjaan_ayah;
    public $penghasilan_ayah;
    public $telp_ayah;
    public $opt_agama, $opt_pendidikan, $opt_pekerjaan,$opt_penghasilan;

    public function mount()
    {
        $data = DataSiswa::where('user_id', auth()->user()->id)->first();
        $this->opt_agama = JenisAgama::all()->pluck('name', 'id')->toArray();
        $this->opt_pendidikan = JenisPendidikan::all()->pluck('name', 'id')->toArray();
        $this->opt_pekerjaan = JenisPekerjaan::all()->pluck('name', 'id')->toArray();
        
        $this->opt_penghasilan = JenisPenghasilan::all()->pluck('name', 'id')->toArray();        $this->status_ayah = $data->status_ayah;
        $this->nik_ayah = $data->nik_ayah;
        $this->nama_ayah = $data->nama_ayah;
        $this->agama_ayah = $data->agama_ayah;
        $this->pendidikan_ayah = $data->pendidikan_ayah;
        $this->pekerjaan_ayah = $data->pekerjaan_ayah;
        $this->penghasilan_ayah = $data->penghasilan_ayah;
        $this->telp_ayah = $data->telp_ayah;
    }

    protected $rules = [
        'status_ayah' => 'required',
        'nik_ayah' => 'required|numeric|digits:16',
        'nama_ayah' => 'required',
        'agama_ayah' => 'required',
        'pendidikan_ayah' => 'required',
        'pekerjaan_ayah' => 'required',
        'penghasilan_ayah' => 'required',
        'telp_ayah' => 'required|phone:ID',
    ];

    protected $validationAttributes = [
        'status_ayah' => 'status ayah',
        'nik_ayah' => 'nik ayah',
        'nama_ayah' => 'nama ayah',
        'agama_ayah' => 'agama ayah',
        'pendidikan_ayah' => 'pendidikan ayah',
        'pekerjaan_ayah' => 'pekerjaan ayah',
        'penghasilan_ayah' => 'penghasilan ayah',
        'telp_ayah' => 'telp ayah',
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
        return view('livewire.datasiswa.ayah');
    }
}
