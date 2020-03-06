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
        'code', 'usable_from', 'usable_to', 'promotion_value', 'created_by', 'updated_by'
    ];

    /**
     * Get the user that created the price.
     */
    public function userCreated()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the user that created the price.
     */
    public function userUpdated()
    {
        return $this->belongsTo('App\Models\User');
    }
}
