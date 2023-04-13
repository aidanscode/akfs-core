<?php

namespace Carnival\Models;

use Carnival\Models\Model;

class UserRank extends Model {
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