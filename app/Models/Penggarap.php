<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Storage;

/**
 * @SWG\Definition(
 *      definition="Penggarap",
 *      required={"nip", "nama", "ktp", "kk", "jenis_kelamin", "status_pernikahan", "telpon", "status", "alamat"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nip",
 *          description="nip",
 *          type="string"
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
 *          property="kk",
 *          description="kk",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="kk_file",
 *          description="kk_file",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="jenis_kelamin",
 *          description="jenis_kelamin",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="status_pernikahan",
 *          description="status_pernikahan",
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
 *          property="status",
 *          description="status",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="alamat",
 *          description="alamat",
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
class Penggarap extends Model
{
    use SoftDeletes;

    public $table = 'penggaraps';

    protected $dates = ['deleted_at'];

    public $fillable = [
        'nip',
        'nama',
        'ktp',
        'ktp_file',
        'kk',
        'kk_file',
        'jenis_kelamin',
        'status_pernikahan',
        'telpon',
        'email',
        'photo',
        'status',
        'alamat',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nip' => 'string',
        'nama' => 'string',
        'ktp' => 'string',
        'ktp_file' => 'string',
        'kk' => 'string',
        'kk_file' => 'string',
        'jenis_kelamin' => 'string',
        'status_pernikahan' => 'string',
        'telpon' => 'string',
        'email' => 'string',
        'photo' => 'string',
        'status' => 'string',
        'alamat' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nip' => 'required|unique:penggaraps',
        'nama' => 'required|max:50',
        'ktp' => 'required|min:5|max:30|unique:penggaraps',
        'ktp_file' => 'nullable',
        'kk' => 'required|min:5|max:30|unique:penggaraps',
        'kk_file' => 'nullable',
        'jenis_kelamin' => 'required|max:15',
        'status_pernikahan' => 'required|max:15',
        'telpon' => 'required|max:30|unique:penggaraps',
        'email' => 'nullable|email',
        'photo' => 'nullable',
        'status' => 'required|max:15',
        'alamat' => 'required',
    ];

    public function pasangan()
    {
        return $this->hasOne('App\Models\Pasangan');
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

    public function getKkFileAttribute($value)
    {
        if ($value == null) {
            return "";
        }
        return asset(Storage::url($value));
    }
}
