<?php

namespace Carnival\Models;

use Carnival\Models\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ThreadCategory extends Model {
    protected $fillable = [
        'name',
        'is_user_created'
    ];

    public static function boot() {
        parent::boot();
    }

    public function threads() : HasMany {
        return $this->hasMany(Thread::class);
    }
}