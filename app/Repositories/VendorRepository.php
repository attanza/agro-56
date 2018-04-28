<?php

namespace App\Repositories;

use App\Models\Vendor;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class VendorRepository
 * @package App\Repositories
 * @version April 28, 2018, 10:13 pm WIB
 *
 * @method Vendor findWithoutFail($id, $columns = ['*'])
 * @method Vendor find($id, $columns = ['*'])
 * @method Vendor first($columns = ['*'])
*/
class VendorRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'alamat',
        'telpon',
        'npwp',
        'siup',
        'tdp',
        'jenis_saprotan',
        'harga',
        'nama_penganggung_jawab',
        'posisi_penanggung_jawab',
        'alamat_penanggung_jawab',
        'no_telpon_penanggung_jawab'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Vendor::class;
    }
}
