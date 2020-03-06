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
        'title', 'content', 'created_by', 'updated_by'
    ];

    /**
     * Get the user that created the news.
     */
    public function userCreated()
    {
        return $this->belongsTo('App\Models\User', 'created_by');
    }

    /**
     * Get the user that updated the news.
     */
    public function userUpdated()
    {
        return $this->belongsTo('App\Models\User', 'updated_by');
    }

    /**
     * Get list of news.
     *
     * @return Collection
     */
    public function getListOfNews()
    {
        return $this
            ->select('id', 'title', 'created_by', 'updated_by', 'created_at', 'updated_at')
            ->with('userCreated:id,username', 'userUpdated:id,username')
            ->orderByDesc('updated_at')
            ->paginate(5);
    }
}
