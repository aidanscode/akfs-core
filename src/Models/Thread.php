<?php

namespace Carnival\Models;

use Carnival\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Thread extends Model {
    protected $fillable = [
        'creator_id',
        'name',
        'forum_id',
        'category_id'
    ];

    public static function boot() {
        parent::boot();
    }

    public function posts() : HasMany {
        return $this->hasMany(Post::class);
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class, 'creator_id', 'id');
    }

    public function forum() : BelongsTo {
        return $this->belongsTo(Forum::class);
    }
}