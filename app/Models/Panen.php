<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Panen",
 *      required={"nama", "penggarap_id", "tanggal", "komoditi_id", "jumlah", "harga"},
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
 *          property="penggarap_id",
 *          description="penggarap_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tanggal",
 *          description="tanggal",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="komoditi_id",
 *          description="komoditi_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="jumlah",
 *          description="jumlah",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="harga",
 *          description="harga",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="pembayaran",
 *          description="pembayaran",
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
class Panen extends Model
{
    use SoftDeletes;

    public $table = 'panens';

    protected $dates = ['deleted_at', 'tangggal'];

    protected $with = ['penggarap:id,nama', 'komoditi:id,nama'];

    public $fillable = [
        'nama',
        'penggarap_id',
        'tanggal',
        'komoditi_id',
        'jumlah',
        'harga',
        'pembayaran',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'penggarap_id' => 'integer',
        'tanggal' => 'date',
        'komoditi_id' => 'integer',
        'jumlah' => 'integer',
        'harga' => 'integer',
        'pembayaran' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required|max:50',
        'penggarap_id' => 'required|integer',
        'tanggal' => 'required|date',
        'komoditi_id' => 'required|integer',
        'jumlah' => 'required|integer',
        'harga' => 'required|integer',
        'pembayaran' => 'integer',
    ];

    public function penggarap()
    {
        return $this->belongsTo('App\Models\Penggarap', 'penggarap_id');
    }

    public function komoditi()
    {
        return $this->belongsTo('App\Models\Komoditas', 'komoditi_id');
    }
}
