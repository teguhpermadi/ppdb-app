<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

class SiswaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->id;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'nama_lengkap' => 'required',
            'nama_panggilan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'village_id' => 'required',
            'kodepos' => 'required|postal_code:ID',
            'nik' => 'required|numeric|digits:16',
            'nkk' => 'required|numeric|digits:16',
            'nisn' => 'required|numeric|digits:10',
            'scan_akta' => 'nullable|mimes:pdf',
            'scan_kartu_keluarga' => 'nullable|mimes:pdf',
            'scan_surat' => 'nullable|mimes:pdf',
            'scan_ijazah' => 'nullable|mimes:pdf',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'nama_lengkap' => 'nama lengkap',
            'nama_panggilan' => 'nama panggilan',
            'tempat_lahir' => 'tempat lahir',
            'tanggal_lahir' => 'tanggal lahir',
            'village_id' => 'kelurahan',
            'nik' => 'nomor induk kependudukan',
            'nkk' => 'nomor kartu keluarga',
            'nisn' => 'nomor induk siswa nasional',
            'scan_akta' => 'scan akta lahir',
            'scan_kartu_keluarga' => 'scan kartu keluarga',
            'scan_surat' => 'scan surat',
            'scan_ijazah' => 'scan ijazah',
        ];
    }
}
