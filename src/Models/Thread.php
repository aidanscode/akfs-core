<?php

namespace Carnival\Models;

use Carnival\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Thread extends Model {
    protected $fillable = [
        'creator_id',
        'name',
        'forum_id',
        'thread_category_id'
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

    public function threadCategory() : HasOne {
        return $this->hasOne(ThreadCategory::class);
    }
}