<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, UsesUuid, SoftDeletes, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'name', 'email', 'phone', 'gender', 'birthday', 'role', 'password', 'avatar', 'provider', 'provider_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the news for user
     */
    public function news()
    {
        return $this->hasMany('App\Models\News');
    }

    /**
     * Get the stadiums for user
     */
    public function stadium()
    {
        return $this->hasOne('App\Models\Stadium', 'owned_by')->withTrashed();
    }

    /**
     * Get the teams for user
     */
    public function teams()
    {
        return $this->belongsToMany('App\Models\Team', 'team_members');
    }

    /**
     * Get the bookings for user
     */
    public function bookings()
    {
        return $this->hasMany('App\Models\Booking');
    }
}
