<?php

namespace App\Models;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Stadium extends Model
{
    use UsesUuid;

    public $table = 'stadiums';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'opening_time', 'closing_time', 'status', 'owned_by', 'created_by', 'updated_by'
    ];

    /**
     * Get the user that owns the stadium.
     */
    public function userOwns()
    {
        return $this->belongsTo('App\Models\User', 'owned_by');
    }

    /**
     * Get the user that created the stadium.
     */
    public function userCreated()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    /**
     * Get the user that updated the stadium.
     */
    public function userUpdated()
    {
        return $this->belongsTo('App\Models\User', 'updated_by');
    }

    /**
     * Get the fields for stadium
     */
    public function fields()
    {
        return $this->hasMany('App\Models\Field');
    }
}
