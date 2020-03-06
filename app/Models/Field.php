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
        'stadium_id', 'name', 'opening_time', 'closing_time', 'type', 'condition'
    ];

    /**
     * Get the stadium that owns the field.
     */
    public function stadium()
    {
        return $this->belongsTo('App\Models\Stadium');
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
