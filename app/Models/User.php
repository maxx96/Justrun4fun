<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'foundation_id',
        'role_id',
        'photo_id',
        'is_active',
        'email',
        'password',
        'firstname',
        'surname',
        'sex',
        'city',
        'date_of_birth',
        'total_points'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    public function foundation()
    {
        return $this->belongsTo('App\Models\Foundation');
    }

    public function photo()
    {
        return $this->belongsTo('App\Models\Photo');
    }

    public function isAdmin()
    {
        if ($this->role_id == 1) {
            return true;
        }
        return false;
    }

    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_users');
    }
}
