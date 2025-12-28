<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FAQCategory extends Model
{
    public function faqs()
    {
        return $this->hasMany(FAQ::class);
    }
}
