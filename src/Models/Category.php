<?php

namespace Carnival\Models;

use Carnival\Models\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model {
    protected $fillable = [
        'name'
    ];

    public static function boot() {
        parent::boot();
    }

    public function forums() : HasMany {
        return $this->hasMany(Forum::class);
    }
}