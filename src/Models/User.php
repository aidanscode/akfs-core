<?php

namespace Carnival\Models;

use Carnival\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Model {
    protected $fillable = [
        'rank_id',
        'username',
        'email',
        'timezone',
    ];

    public static function boot() {
        parent::boot();
    }

    public function posts() : HasMany {
        return $this->hasMany(Post::class);
    }

    public function threads() : HasMany {
        return $this->hasMany(Thread::class);
    }

    public function ranks() : BelongsToMany {
        return $this->belongsToMany(Rank::class)->using(UserRank::class);
    }
}