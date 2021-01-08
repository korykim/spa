<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class news extends Model
{
    public function newsmaker(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pinglun(): HasMany
    {
        return $this->hasMany(Pinglun::class);
    }
}
