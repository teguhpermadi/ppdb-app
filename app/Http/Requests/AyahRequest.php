<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AyahRequest extends FormRequest
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
            'status_ayah' => 'required',
            'nik_ayah' => 'required|numeric|digits:16',
            'nama_ayah' => 'required',
            'agama_ayah' => 'required',
            'pendidikan_ayah' => 'required',
            'pekerjaan_ayah' => 'required',
            'penghasilan_ayah' => 'required',
            'telp_ayah' => 'required|phone:ID',
            'scan_ktp_ayah' => 'nullable|mimes:pdf',
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
            'status_ayah' => 'status ayah',
            'nik_ayah' => 'nik ayah',
            'nama_ayah' => 'nama ayah',
            'agama_ayah' => 'agama ayah',
            'pendidikan_ayah' => 'pendidikan ayah',
            'pekerjaan_ayah' => 'pekerjaan ayah',
            'penghasilan_ayah' => 'penghasilan ayah',
            'telp_ayah' => 'telp ayah',
            'scan_ktp_ayah' => 'scan ktp ayah',
        ];
    }
}
