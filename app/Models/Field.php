<?php

namespace App\Models;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    use UsesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'stadium_id', 'name', 'opening_time', 'closing_time', 'type', 'condition', 'created_by', 'updated_by'
    ];

    /**
     * Get the stadium that owns the field.
     */
    public function stadium()
    {
        return $this->belongsTo('App\Models\Stadium');
    }

    /**
     * Get the user that created the field.
     */
    public function userCreated()
    {
        return $this->belongsTo('App\Models\User', 'id', 'created_by');
    }

    /**
     * Get the user that updated the field.
     */
    public function userUpdated()
    {
        return $this->belongsTo('App\Models\User', 'id', 'updated_by');
    }

    /**
     * Get the price for field
     */
    public function price()
    {
        return $this->hasOne('App\Models\PriceForFieldPerHour');
    }

    /**
     * Get the bookings for stadium
     */
    public function bookings()
    {
        return $this->hasMany('App\Models\Booking');
    }
}
