<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Storage;

/**
 * @SWG\Definition(
 *      definition="Pasangan",
 *      required={"penggarap_id", "nama", "ktp", "jenis_kelamin", "no_surat_nikah"},
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
 *          property="ktp",
 *          description="ktp",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="ktp_file",
 *          description="ktp_file",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="jenis_kelamin",
 *          description="jenis_kelamin",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="telpon",
 *          description="telpon",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="email",
 *          description="email",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="photo",
 *          description="photo",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="no_surat_nikah",
 *          description="no_surat_nikah",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="surat_nikah_file",
 *          description="surat_nikah_file",
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
class Pasangan extends Model
{
    use SoftDeletes;

    public $table = 'pasangans';

    protected $with = ['penggarap:id,nama'];

    protected $dates = ['deleted_at'];

    public $fillable = [
        'penggarap_id',
        'nama',
        'ktp',
        'ktp_file',
        'jenis_kelamin',
        'telpon',
        'email',
        'photo',
        'no_surat_nikah',
        'surat_nikah_file',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'penggarap_id' => 'integer',
        'nama' => 'string',
        'ktp' => 'string',
        'ktp_file' => 'string',
        'jenis_kelamin' => 'string',
        'telpon' => 'string',
        'email' => 'string',
        'photo' => 'string',
        'no_surat_nikah' => 'string',
        'surat_nikah_file' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'penggarap_id' => 'required|integer',
        'nama' => 'required|max:50',
        'ktp' => 'required|max:25|unique:pasangans',
        'ktp_file' => 'nullable',
        'jenis_kelamin' => 'required|max:15',
        'telpon' => 'nullable|max:30',
        'email' => 'nullable|email',
        'photo' => 'nullable',
        'no_surat_nikah' => 'required|max:30|unique:pasangans',
        'surat_nikah_file' => 'nullable',
    ];

    public function penggarap()
    {
        return $this->belongsTo('App\Models\Penggarap', 'penggarap_id');
    }

    public function getPhotoAttribute($value)
    {
        if ($value == null) {
            return asset('images/male.png');
        } elseif (!Storage::disk('local')->exists($value)) {
            return asset('images/male.png');
        } else {
            return asset(Storage::url($value));
        }
    }

    public function getKtpFileAttribute($value)
    {
        if ($value == null) {
            return "";
        }
        return asset(Storage::url($value));
    }

    public function getSuratNikahFileAttribute($value)
    {
        if ($value == null) {
            return "";
        }
        return asset(Storage::url($value));
    }

}
