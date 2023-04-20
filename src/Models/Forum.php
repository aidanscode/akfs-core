<?php

namespace Carnival\Models;

use Carnival\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Forum extends Model {
    protected $fillable = [
        'name',
        'category_id'
    ];

    public static function boot() {
        parent::boot();
    }

    public function category() : BelongsTo {
        return $this->belongsTo(Category::class);
    }

    public function threads() : HasMany {
        return $this->hasMany(Thread::class);
    }
}