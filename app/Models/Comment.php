<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id',
    ];

    /**
     * Fillable fields for a Profile.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'message',
        'parent_id',
        'status',
        'post_id'
    ];
    
    /**
     * Get post comments
     * @return type
     */
    public function childComments()
    {
        return $this->hasMany('App\Models\Comment', 'parent_id');
    }
}
