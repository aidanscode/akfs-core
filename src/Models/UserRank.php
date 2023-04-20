<?php

namespace Carnival\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class UserRank extends Pivot {
    public $table = 'user_ranks';

    protected $fillable = [
        'user_id',
        'rank_id',
        'is_display_rank'
    ];

    public static function boot() {
        parent::boot();
    }
}