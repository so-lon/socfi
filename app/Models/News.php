<?php

namespace App\Models;

use App\Models\Concerns\UsesUuid;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use UsesUuid;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'created_by', 'updated_by'
    ];

    /**
     * Get the user that created the news.
     */
    public function userCreated()
    {
        return $this->belongsTo('App\Models\User', 'id', 'created_by');
    }

    /**
     * Get the user that updated the news.
     */
    public function userUpdated()
    {
        return $this->belongsTo('App\Models\User', 'id', 'updated_by');
    }
}
