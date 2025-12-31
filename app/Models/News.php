<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /**
     * @var false|mixed|resource|string|null
     */
    public $content;
    protected $fillable = ['title', 'content', 'user_id', 'is_published', 'published_at'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
