<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IbuRequest extends FormRequest
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
            'status_ibu' => 'required',
            'nik_ibu' => 'required|numeric|digits:16',
            'nama_ibu' => 'required',
            'agama_ibu' => 'required',
            'pendidikan_ibu' => 'required',
            'pekerjaan_ibu' => 'required',
            'penghasilan_ibu' => 'required',
            'telp_ibu' => 'required|phone:ID',
            'scan_ktp_ibu' => 'nullable|mimes:pdf',
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
            'status_ibu' => 'status ibu',
            'nik_ibu' => 'nik ibu',
            'nama_ibu' => 'nama ibu',
            'agama_ibu' => 'agama ibu',
            'pendidikan_ibu' => 'pendidikan ibu',
            'pekerjaan_ibu' => 'pekerjaan ibu',
            'penghasilan_ibu' => 'penghasilan ibu',
            'telp_ibu' => 'telp ibu',
            'scan_ktp_ibu' => 'scan ktp ibu',
        ];
    }
}
