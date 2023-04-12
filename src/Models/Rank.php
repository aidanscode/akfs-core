<?php

namespace Carnival\Models;

use Carnival\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Rank extends Model {
    protected $fillable = [
        'title'
    ];

    public static function boot() {
        parent::boot();
    }

    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }
}