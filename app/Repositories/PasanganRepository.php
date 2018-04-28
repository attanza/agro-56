<?php

namespace App\Repositories;

use App\Models\Pasangan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PasanganRepository
 * @package App\Repositories
 * @version April 28, 2018, 11:57 pm WIB
 *
 * @method Pasangan findWithoutFail($id, $columns = ['*'])
 * @method Pasangan find($id, $columns = ['*'])
 * @method Pasangan first($columns = ['*'])
*/
class PasanganRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'penggarap_id',
        'nama',
        'ktp',
        'ktp_file',
        'jenis_kelamin',
        'telpon',
        'email',
        'photo',
        'no_surat_nikah',
        'surat_nikah_file'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pasangan::class;
    }
}
