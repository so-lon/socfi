<?php

namespace App\Models;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use UsesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'ban_flag', 'created_by', 'updated_by'
    ];

    /**
     * Get the user that created the team.
     */
    public function userCreated()
    {
        return $this->belongsTo('App\Models\User');
    }
}
