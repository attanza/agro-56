<?php

namespace App\Repositories;

use App\Models\JenisSaprotan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class JenisSaprotanRepository
 * @package App\Repositories
 * @version April 28, 2018, 11:09 am WIB
 *
 * @method JenisSaprotan findWithoutFail($id, $columns = ['*'])
 * @method JenisSaprotan find($id, $columns = ['*'])
 * @method JenisSaprotan first($columns = ['*'])
*/
class JenisSaprotanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'keterangan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return JenisSaprotan::class;
    }
}
