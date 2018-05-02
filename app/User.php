<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Storage;
use Mail;
use App\Mail\ResetPasswordMail;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_active', 'last_login', 'role_id', 'photo',
    ];

    protected $with = ['role:id,nama'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Models\Role', 'role_id');
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

    public function sendPasswordResetNotification($token)
    {
        // $this->notify(new ResetPasswordNotification($token));
        Mail::to($this->email)
            ->queue(new ResetPasswordMail($this, $token));
    }
}