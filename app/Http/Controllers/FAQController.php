<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FAQCategory;
use Illuminate\View\View;

class FAQController extends Controller
{
    public function show(): View
    {
        $categories = FaqCategory::with(['faqs' => function ($query) {
            $query->where('is_published', true);
        }])->get();

        return view('faq.show', compact('categories'));
    }
}
