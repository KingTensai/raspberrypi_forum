<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @method static where(string $string, true $true)
 */
class FAQ extends Model
{
    protected $table = 'faqs';
    protected $fillable = ['faq_category_id', 'question', 'answer', 'is_published'];
    public function category(): BelongsTo
    {
        return $this->belongsTo(FAQCategory::class, 'faq_category_id');
    }
}
