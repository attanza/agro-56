<?php

namespace App\Repositories;

use App\Models\LahanGarapan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LahanGarapanRepository
 * @package App\Repositories
 * @version May 13, 2018, 11:56 am WIB
 *
 * @method LahanGarapan findWithoutFail($id, $columns = ['*'])
 * @method LahanGarapan find($id, $columns = ['*'])
 * @method LahanGarapan first($columns = ['*'])
*/
class LahanGarapanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'penggarap_id',
        'nama',
        'alamat',
        'lat',
        'lng',
        'keterangan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LahanGarapan::class;
    }
}
