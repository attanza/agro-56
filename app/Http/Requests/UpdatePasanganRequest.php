<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePasanganRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'penggarap_id' => 'required|integer',
            'nama' => 'required|max:50',
            'ktp' => 'required|max:25|unique:pasangans,ktp,' . $this->pasangan,
            'ktp_file' => 'nullable',
            'jenis_kelamin' => 'required|max:15',
            'telpon' => 'nullable|max:30',
            'email' => 'nullable|email',
            'photo' => 'nullable',
            'no_surat_nikah' => 'required|max:30|unique:pasangans,no_surat_nikah,' . $this->pasangan,
            'surat_nikah_file' => 'nullable',
        ];
    }
}
