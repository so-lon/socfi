<?php

namespace App\Models;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class PriceForFieldPerHour extends Model
{
    protected $table = 'price_for_field_per_hour';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'stadium_id', 'field_id', 'days_of_week', 'slot_start', 'slot_end', 'price_per_hour'
    ];

    /**
     * Get the field that owns the price.
     */
    public function field()
    {
        return $this->belongsTo('App\Models\Field');
    }
}
