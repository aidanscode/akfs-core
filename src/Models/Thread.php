<?php

namespace Carnival\Models;

use Carnival\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Thread extends Model {
    protected $fillable = [
        'user_id', // who created the thread? user_id/creating_user_id/creator_id/etc.
        'name',
        'category', //should category/topic be its own model aka, category_id, topic_id where the categories have an id, name etc.
        //what else is exclusive to a thread
    ];

    public static function boot() {
        parent::boot();
    }

    public function posts() : HasMany {
        return $this->hasMany(Post::class);
    }

    //Do we want to keep track of the user who created a thread
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}