<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = [
        'title',
        'author',
        'body',
    ];

    //可以针对不同的字段进行设置时间格式化
    protected $casts = [
        'created_at' => 'date:Y-m-d',
        'updated_at' => 'datetime:Y-m-d H:m',
    ];


    //统一时间格式化
//    protected function serializeDate(DateTimeInterface $date)
//    {
//        return $date->format('Y-m-d H:m');
//    }

    public function user(): BelongsTo // WORKS
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }
    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }


}
