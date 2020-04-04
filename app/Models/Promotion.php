<?php

namespace App\Models;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use UsesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'usable_from', 'usable_to', 'days_of_week', 'value', 'created_by', 'updated_by'
    ];

    /**
     * Get the stadium that has the promotion.
     */
    public function stadiums() {
        return $this->belongsToMany('App\Models\Stadium', 'stadium_promotion', 'promotion_id', 'stadium_id');
    }

    /**
     * Get the user that created the promotion.
     */
    public function userCreated()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the user that created the promotion.
     */
    public function userUpdated()
    {
        return $this->belongsTo('App\Models\User');
    }
}
