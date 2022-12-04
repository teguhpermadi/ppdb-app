<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WaliRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'hubungan_wali' => 'required',
            'nik_wali' => 'required|numeric|digits:16',
            'nama_wali' => 'required',
            'agama_wali' => 'required',
            'pendidikan_wali' => 'required',
            'pekerjaan_wali' => 'required',
            'penghasilan_wali' => 'required',
            'telp_wali' => 'required|phone:ID',
            'scan_ktp_wali' => 'nullable|mimes:pdf',
        ];
    }

    public function attributes()
    {
        return [
            'hubungan_wali' => 'status wali',
            'nik_wali' => 'nik wali',
            'nama_wali' => 'nama wali',
            'agama_wali' => 'agama wali',
            'pendidikan_wali' => 'pendidikan wali',
            'pekerjaan_wali' => 'pekerjaan wali',
            'penghasilan_wali' => 'penghasilan wali',
            'telp_wali' => 'telp wali',
            'scan_ktp_wali' => 'scan ktp wali',
        ];
    }
}
