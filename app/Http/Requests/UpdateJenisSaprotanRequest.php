<?php

namespace App\Http\Requests;

use App\Models\JenisSaprotan;
use Illuminate\Foundation\Http\FormRequest;

class UpdateJenisSaprotanRequest extends FormRequest
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
            'nama' => 'required|max:50|unique:jenis_saprotans,nama,' . $this->jenisSaprotan,
            'keterangan' => 'max:250',
        ];
    }
}
