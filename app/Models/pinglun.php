<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class pinglun extends Model
{
    public function news(): BelongsTo
    {
        return $this->belongsTo(news::class);
    }
}
