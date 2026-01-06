<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'content', 'user_id', 'is_published', 'published_at','image'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
