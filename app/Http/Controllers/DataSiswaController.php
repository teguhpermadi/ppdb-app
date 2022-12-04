<?php

namespace App\Http\Controllers;

use App\Http\Requests\AyahRequest;
use App\Http\Requests\IbuRequest;
use App\Http\Requests\SiswaRequest;
use App\Http\Requests\WaliRequest;
use App\Models\DataSiswa;
use App\Models\JenisAgama;
use App\Models\JenisHubungan;
use App\Models\JenisPekerjaan;
use App\Models\JenisPendidikan;
use App\Models\JenisPenghasilan;
use App\Models\JenisStatus;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Arr;

class DataSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DataSiswa::where('user_id', auth()->user()->id)->first();
        
        if(Arr::has($data, ['nama_lengkap', 'nama_panggilan', 'tempat_lahir', 'tanggal_lahir', 'alamat', 'village_id', 'kodepos', 'nik', 'nkk', 'nisn']))
        {
            $dataSiswa = true;
        }

        if(Arr::has($data, ['status_ayah', 'nik_ayah', 'nama_ayah', 'agama_ayah', 'pekerjaan_ayah', 'penghasilan_ayah', 'telp_ayah']))
        {
            $dataAyah = true;
        }
        
        if(Arr::has($data, ['status_ibu', 'nik_ibu', 'nama_ibu', 'agama_ibu', 'pekerjaan_ibu', 'penghasilan_ibu', 'telp_ibu']))
        {
            $dataIbu = true;
        }
        
        if(Arr::has($data, ['hubungan_wali', 'nik_wali', 'nama_wali', 'agama_wali', 'pekerjaan_wali', 'penghasilan_wali', 'telp_wali']))
        {
            $dataWali = true;
        }

        return view('datasiswa.index', [
            'dataSiswa' => $dataSiswa,
            'dataAyah' => $dataAyah,
            'dataIbu' => $dataIbu,
            'dataWali' => $dataWali,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function siswaCreate()
    {
        $data = DataSiswa::where('user_id', auth()->user()->id)->first();
        return view('datasiswa.create-siswa', ['data' => $data]);
    }

    public function ayahCreate()
    {
        $data = DataSiswa::where('user_id', auth()->user()->id)->first();
        $opt_status = JenisStatus::all()->pluck('name', 'id')->toArray();
        $opt_agama = JenisAgama::all()->pluck('name', 'id')->toArray();
        $opt_pendidikan = JenisPendidikan::all()->pluck('name', 'id')->toArray();
        $opt_pekerjaan = JenisPekerjaan::all()->pluck('name', 'id')->toArray();
        $opt_penghasilan = JenisPenghasilan::all()->pluck('name', 'id')->toArray();
        // dd($data);
        return view('datasiswa.create-ayah', 
                    ['data' => $data, 
                    'opt_status' => $opt_status,
                    'opt_agama' => $opt_agama, 
                    'opt_pendidikan' => $opt_pendidikan, 
                    'opt_pekerjaan' => $opt_pekerjaan,
                    'opt_penghasilan' => $opt_penghasilan,
                ]);
    }

    public function ibuCreate()
    {
        $data = DataSiswa::where('user_id', auth()->user()->id)->first();
        $opt_status = JenisStatus::all()->pluck('name', 'id')->toArray();
        $opt_agama = JenisAgama::all()->pluck('name', 'id')->toArray();
        $opt_pendidikan = JenisPendidikan::all()->pluck('name', 'id')->toArray();
        $opt_pekerjaan = JenisPekerjaan::all()->pluck('name', 'id')->toArray();
        $opt_penghasilan = JenisPenghasilan::all()->pluck('name', 'id')->toArray();
        // dd($data);
        return view('datasiswa.create-ibu', 
                    ['data' => $data, 
                    'opt_status' => $opt_status,
                    'opt_agama' => $opt_agama, 
                    'opt_pendidikan' => $opt_pendidikan, 
                    'opt_pekerjaan' => $opt_pekerjaan,
                    'opt_penghasilan' => $opt_penghasilan,
                ]);
    }

    public function waliCreate()
    {
        $data = DataSiswa::where('user_id', auth()->user()->id)->first();
        $opt_hubungan = JenisHubungan::all()->pluck('name', 'id')->toArray();
        $opt_agama = JenisAgama::all()->pluck('name', 'id')->toArray();
        $opt_pendidikan = JenisPendidikan::all()->pluck('name', 'id')->toArray();
        $opt_pekerjaan = JenisPekerjaan::all()->pluck('name', 'id')->toArray();
        $opt_penghasilan = JenisPenghasilan::all()->pluck('name', 'id')->toArray();
        // dd($data);
        return view('datasiswa.create-wali', 
                    ['data' => $data, 
                    'opt_hubungan' => $opt_hubungan,
                    'opt_agama' => $opt_agama, 
                    'opt_pendidikan' => $opt_pendidikan, 
                    'opt_pekerjaan' => $opt_pekerjaan,
                    'opt_penghasilan' => $opt_penghasilan,
                ]);
    }

    public function create($param)
    {
        
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function siswaStore(SiswaRequest $request)
    {
        $validated = $request->validated();

        // upload scan akta
        if ($request->file('scan_akta')) {
            $path_scan_akta = $request->scan_akta->storeAs('public/'.auth()->user()->id, 'scan_akta.pdf');
            $validated['scan_akta'] = auth()->user()->id.'/scan_akta.pdf';            
        }

        // upload scan kk
        if ($request->file('scan_kartu_keluarga')) {
            $path_scan_kartu_keluarga = $request->scan_kartu_keluarga->storeAs('public/'.auth()->user()->id, 'scan_kartu_keluarga.pdf');
            $validated['scan_kartu_keluarga'] = auth()->user()->id.'/scan_kartu_keluarga.pdf';            
        }

        // upload scan surat
        if ($request->file('scan_surat')) {
            $path_scan_surat = $request->scan_surat->storeAs('public/'.auth()->user()->id, 'scan_surat.pdf');
            $validated['scan_surat'] = auth()->user()->id.'/scan_surat.pdf';            
        }

        // upload scan ijazah
        if ($request->file('scan_ijazah')) {
            $path_scan_ijazah = $request->scan_ijazah->storeAs('public/'.auth()->user()->id, 'scan_ijazah.pdf');
            $validated['scan_ijazah'] = auth()->user()->id.'/scan_ijazah.pdf';            
        }

        DataSiswa::updateOrCreate(['user_id' => auth()->user()->id], $validated);

        Alert::success('Sukses', 'Data siswa berhasil tersimpan');
        return to_route('datasiswa.index');
    }

    public function ayahStore(AyahRequest $request)
    {
        $validated = $request->validated();
        
        if ($request->file('scan_ktp_ayah')) {
            $path_scan_ktp_ayah = $request->scan_ktp_ayah->storeAs('public/'.auth()->user()->id, 'scan_ktp_ayah.pdf');
            $validated['scan_ktp_ayah'] = auth()->user()->id.'/scan_ktp_ayah.pdf';            
        }

        DataSiswa::updateOrCreate(['user_id' => auth()->user()->id], $validated);

        Alert::success('Sukses', 'Data ayah berhasil tersimpan');
        return to_route('datasiswa.index');

    }
    
    public function ibuStore(IbuRequest $request)
    {
        $validated = $request->validated();
        
        if ($request->file('scan_ktp_ibu')) {
            $path_scan_ktp_ibu = $request->scan_ktp_ibu->storeAs('public/'.auth()->user()->id, 'scan_ktp_ibu.pdf');
            $validated['scan_ktp_ibu'] = auth()->user()->id.'/scan_ktp_ibu.pdf';            
        }

        DataSiswa::updateOrCreate(['user_id' => auth()->user()->id], $validated);

        Alert::success('Sukses', 'Data ibu berhasil tersimpan');
        return to_route('datasiswa.index');
    }
    
    public function waliStore(WaliRequest $request)
    {
        $validated = $request->validated();

        if ($request->file('scan_ktp_wali')) {
            $path_scan_ktp_wali = $request->scan_ktp_wali->storeAs('public/'.auth()->user()->id, 'scan_ktp_wali.pdf');
            $validated['scan_ktp_wali'] = auth()->user()->id.'/scan_ktp_wali.pdf';            
        }

        DataSiswa::updateOrCreate(['user_id' => auth()->user()->id], $validated);

        Alert::success('Sukses', 'Data wali berhasil tersimpan');
        return to_route('datasiswa.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataSiswa  $dataSiswa
     * @return \Illuminate\Http\Response
     */
    public function show(DataSiswa $dataSiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataSiswa  $dataSiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(DataSiswa $dataSiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataSiswa  $dataSiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DataSiswa $dataSiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataSiswa  $dataSiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(DataSiswa $dataSiswa)
    {
        //
    }
}
