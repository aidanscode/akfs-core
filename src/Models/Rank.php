<?php

namespace Carnival\Models;

use Carnival\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Rank extends Model {
    protected $fillable = [
        'title'
    ];

    public static function boot() {
        parent::boot();
    }

    public function user() : BelongsToMany {
        return $this->belongsToMany(User::class)->using(UserRank::class);
    }
}