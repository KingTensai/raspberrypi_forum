<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FAQCategory extends Model
{
    protected $table = 'faq_categories';
    use HasFactory;

    protected $fillable = ['name', 'slug'];
    public function faqs(): HasMany
    {
        return $this->hasMany(FAQ::class, 'faq_category_id');
    }

}
