<?php

namespace App\Repositories;

use App\Models\Komoditas;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KomoditasRepository
 * @package App\Repositories
 * @version April 28, 2018, 10:46 am WIB
 *
 * @method Komoditas findWithoutFail($id, $columns = ['*'])
 * @method Komoditas find($id, $columns = ['*'])
 * @method Komoditas first($columns = ['*'])
*/
class KomoditasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'satuan',
        'satuan',
        'harga'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Komoditas::class;
    }
}
