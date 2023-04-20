<?php

namespace Carnival\Models;

use Carnival\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model {
    protected $fillable = [
        'author_id',
        'thread_id',
        'title',
        'body'
    ];

    public static function boot() {
        parent::boot();
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function thread() : BelongsTo {
        return $this->belongsTo(Thread::class);
    }
}