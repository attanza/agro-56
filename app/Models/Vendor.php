<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Storage;

/**
 * @SWG\Definition(
 *      definition="Vendor",
 *      required={"nama", "telpon", "npwp", "siup", "tdp", "jenis_saprotan", "harga", "nama_penganggung_jawab", "no_telpon_penanggung_jawab"},
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
 *          property="alamat",
 *          description="alamat",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="telpon",
 *          description="telpon",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="npwp",
 *          description="npwp",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="siup",
 *          description="siup",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tdp",
 *          description="tdp",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="jenis_saprotan",
 *          description="jenis_saprotan",
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
 *          property="nama_penganggung_jawab",
 *          description="nama_penganggung_jawab",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="posisi_penanggung_jawab",
 *          description="posisi_penanggung_jawab",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="alamat_penanggung_jawab",
 *          description="alamat_penanggung_jawab",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="no_telpon_penanggung_jawab",
 *          description="no_telpon_penanggung_jawab",
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
class Vendor extends Model
{
    use SoftDeletes;

    public $table = 'vendors';

    protected $with = ['jenis:id,nama'];

    protected $dates = ['deleted_at'];

    public $fillable = [
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
        'no_telpon_penanggung_jawab',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'alamat' => 'string',
        'telpon' => 'string',
        'npwp' => 'string',
        'siup' => 'string',
        'tdp' => 'string',
        'jenis_saprotan' => 'integer',
        'harga' => 'integer',
        'nama_penganggung_jawab' => 'string',
        'posisi_penanggung_jawab' => 'string',
        'alamat_penanggung_jawab' => 'string',
        'no_telpon_penanggung_jawab' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required|unique:vendors',
        'telpon' => 'required|max:30',
        'npwp' => 'required|max:30',
        'siup' => 'required|max:30',
        'tdp' => 'required|max:30',
        'jenis_saprotan' => 'required|integer',
        'harga' => 'required|integer',
        'nama_penganggung_jawab' => 'required|max:50',
        'posisi_penanggung_jawab' => 'max:30',
        'no_telpon_penanggung_jawab' => 'required|max:30',
    ];

    public function jenis()
    {
        return $this->belongsTo('App\Models\JenisSaprotan', 'jenis_saprotan');
    }

    public function getNpwpFileAttribute($value)
    {
        if ($value == null) {
            return "";
        }
        return asset(Storage::url($value));
    }

    public function getSiupFileAttribute($value)
    {
        if ($value == null) {
            return "";
        }
        return asset(Storage::url($value));
    }

    public function getTdpFileAttribute($value)
    {
        if ($value == null) {
            return "";
        }
        return asset(Storage::url($value));
    }

}
