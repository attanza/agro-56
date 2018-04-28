<?php

namespace App\Repositories;

use App\Models\Saprotan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SaprotanRepository
 * @package App\Repositories
 * @version April 28, 2018, 11:25 am WIB
 *
 * @method Saprotan findWithoutFail($id, $columns = ['*'])
 * @method Saprotan find($id, $columns = ['*'])
 * @method Saprotan first($columns = ['*'])
*/
class SaprotanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'jenis_id',
        'merk',
        'satuan',
        'harga_satuan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Saprotan::class;
    }
}
