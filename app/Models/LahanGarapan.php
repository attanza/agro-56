<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="LahanGarapan",
 *      required={"penggarap_id", "nama", "alamat"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="penggarap_id",
 *          description="penggarap_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nama",
 *          description="nama",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="alamat",
 *          description="alamat",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="lat",
 *          description="lat",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="luas",
 *          description="luas",
 *          type="number",
 *          format="integer"
 *      ),
 *      @SWG\Property(
 *          property="satuan",
 *          description="satuan",
 *          type="number",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="lng",
 *          description="lng",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="keterangan",
 *          description="keterangan",
 *          type="string"
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
class LahanGarapan extends Model
{
    use SoftDeletes;

    public $table = 'lahan_garapans';

    protected $dates = ['deleted_at'];

    protected $with = ['penggarap:id,nama'];

    public $fillable = [
        'penggarap_id',
        'nama',
        'alamat',
        'luas',
        'satuan',
        'lat',
        'lng',
        'keterangan',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'penggarap_id' => 'integer',
        'nama' => 'string',
        'alamat' => 'string',
        'luas' => 'integer',
        'satuan' => 'string',
        'lat' => 'float',
        'lng' => 'float',
        'keterangan' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'penggarap_id' => 'required|integer',
        'nama' => 'required|unique:lahan_garapans',
        'alamat' => 'required',
        'luas' => 'required|integer',
        'satuan' => 'required|max:20',
        'lat' => 'nullable|numeric',
        'lng' => 'nullable|numeric',
        'keterangan' => 'nullable',
    ];

    public function penggarap()
    {
        return $this->belongsTo('App\Models\Penggarap', 'penggarap_id');
    }

}
