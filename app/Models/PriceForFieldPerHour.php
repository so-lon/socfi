<?php

namespace App\Models;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class PriceForFieldPerHour extends Model
{
    use UsesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'stadium_id', 'field_id', 'slot_start', 'slot_end', 'price_per_hour', 'created_by', 'updated_by'
    ];

    /**
     * Get the field that owns the price.
     */
    public function field()
    {
        return $this->belongsTo('App\Models\Field');
    }

    /**
     * Get the user that created the price.
     */
    public function userCreated()
    {
        return $this->belongsTo('App\Models\User');
    }
}
