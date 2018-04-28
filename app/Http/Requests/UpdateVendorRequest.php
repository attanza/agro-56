<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Vendor;

class UpdateVendorRequest extends FormRequest
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
            'nama' => 'required|unique:vendors,nama,'.$this->vendor,
            'telpon' => 'required|max:30',
            'npwp' => 'required|max:30',
            'siup' => 'required|max:30',
            'tdp' => 'required|max:30',
            'jenis_saprotan' => 'required|integer',
            'harga' => 'required|integer',
            'nama_penganggung_jawab' => 'required|max:50',
            'posisi_penanggung_jawab' => 'max:30',
            'no_telpon_penanggung_jawab' => 'required|max:30',
        ];
    }
}
