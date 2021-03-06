<?php

namespace App\Http\Requests;

use App\Models\Penggarap;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePenggarapRequest extends FormRequest
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
            'nip' => 'required|unique:penggaraps,nip,' . $this->penggarap,
            'nama' => 'required|max:50',
            'ktp' => 'required|min:5|max:30|unique:penggaraps,ktp,' . $this->penggarap,
            'ktp_file' => 'nullable',
            'kk' => 'required|min:5|max:30|unique:penggaraps,kk,' . $this->penggarap,
            'kk_file' => 'nullable',
            'jenis_kelamin' => 'required|max:15',
            'status_pernikahan' => 'required|max:15',
            'telpon' => 'required|max:30|unique:penggaraps,telpon,' . $this->penggarap,
            'email' => 'nullable|email',
            'photo' => 'nullable',
            'status' => 'required|max:15',
            'alamat' => 'required',
        ];
    }
}
