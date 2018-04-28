<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Komoditas",
 *      required={"nama", "satuan", "harga"},
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
 *          property="satuan",
 *          description="satuan",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="harga",
 *          description="harga",
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
class Komoditas extends Model
{
    use SoftDeletes;

    public $table = 'komoditas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'satuan',
        'harga'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'satuan' => 'string',
        'harga' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required|max:50|unique:komoditas',
        'satuan' => 'required',
        'harga' => 'required'
    ];

    
}
