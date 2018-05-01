<?php

namespace App\Repositories;

use App\Models\Panen;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PanenRepository
 * @package App\Repositories
 * @version May 1, 2018, 3:07 pm WIB
 *
 * @method Panen findWithoutFail($id, $columns = ['*'])
 * @method Panen find($id, $columns = ['*'])
 * @method Panen first($columns = ['*'])
*/
class PanenRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'penggarap_id',
        'tanggal',
        'komoditi_id',
        'jumlah',
        'harga',
        'jumlah'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Panen::class;
    }
}
