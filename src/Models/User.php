<?php

namespace Carnival\Models;

use Carnival\Models\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Model {
    protected $fillable = [
        'external_id',
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

    public function userType() : HasOne {
        return $this->hasOne(UserType::class);
    }

    //can a user belong to multiple orgs/companies/etc, should we have a bridge table/additional model
    public function org() : BelongsTo {
        return $this->belongsTo(Org::class);
    }
}