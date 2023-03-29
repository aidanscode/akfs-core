<?php

namespace Carnival\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model {
    
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'external_id',
        'username',
        'email',
        'timezone',
    ];

    public static function boot() {
        parent::boot();
    }

    /**
     * Relationships
     */

    public function posts() : HasMany {
        return $this->hasMany(Post::class);
    }

    public function threads() : HasMany {
        return $this->hasMany(Thread::class);
    }

    public function userType() : HasOne {
        return $this->hasOne(UserType::class);
    }

    public function org() : BelongsTo {
        return $this->belongsTo(Org::class);
    }

}