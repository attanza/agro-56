<?php

namespace App\Http\Requests;

use App\Models\Saprotan;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSaprotanRequest extends FormRequest
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
            'nama' => 'required|max:50|unique:saprotans,nama,' . $this->saprotan,
            'jenis_id' => 'required|integer',
            'merk' => 'required|max:25',
            'satuan' => 'required|max:15',
            'harga_satuan' => 'required|integer',
        ];
    }
}
