<?php

namespace Carnival\Models;

use Carnival\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model {
    protected $fillable = [
        'user_id',
        'org_id',
        'thread_id',
        'title',
        'body'
    ];

    public static function boot() {
        parent::boot();

        //logic for auto filling user_id/org_id on creation
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function threads() : BelongsTo {
        return $this->belongsTo(Thread::class);
    }
}