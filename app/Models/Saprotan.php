<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Saprotan",
 *      required={"nama", "jenis_id", "merk", "harga_satuan"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nama",
 *          description="nama",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="jenis_id",
 *          description="jenis_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="merk",
 *          description="merk",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="satuan",
 *          description="satuan",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="harga_satuan",
 *          description="harga_satuan",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Saprotan extends Model
{
    use SoftDeletes;

    public $table = 'saprotans';

    protected $dates = ['deleted_at'];

    protected $with = ['jenis:id,nama'];

    public $fillable = [
        'nama',
        'jenis_id',
        'merk',
        'satuan',
        'harga_satuan',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'jenis_id' => 'integer',
        'merk' => 'string',
        'satuan' => 'string',
        'harga_satuan' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required|max:50|unique:saprotans',
        'jenis_id' => 'required|integer',
        'merk' => 'required|max:25',
        'satuan' => 'required|max:15',
        'harga_satuan' => 'required|integer',
    ];

    public function jenis()
    {
        return $this->belongsTo('App\Models\JenisSaprotan', 'jenis_id');
    }
}
