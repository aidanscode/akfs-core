<?php

namespace Carnvial\Models;

use Carnival\Models\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Org extends Model {
    protected $fillable = [
        'name',
        //what else does an org/company/business/ have?
    ];

    public static function boot() {
        parent::boot();
    }

    public function users() : HasMany {
        return $this->hasMany(User::class);
    }
}