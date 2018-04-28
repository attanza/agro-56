<?php

namespace App\Repositories;

use App\Models\Penggarap;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PenggarapRepository
 * @package App\Repositories
 * @version April 28, 2018, 11:11 pm WIB
 *
 * @method Penggarap findWithoutFail($id, $columns = ['*'])
 * @method Penggarap find($id, $columns = ['*'])
 * @method Penggarap first($columns = ['*'])
*/
class PenggarapRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nip',
        'nama',
        'ktp',
        'ktp_file',
        'kk',
        'kk_file',
        'jenis_kelamin',
        'status_pernikahan',
        'telpon',
        'email',
        'photo',
        'status',
        'alamat'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Penggarap::class;
    }
}
