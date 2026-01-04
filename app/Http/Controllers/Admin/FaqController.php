<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use App\Models\FAQCategory;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function show()
    {

        $news = FAQ::orderBy('fas')->orderBy('created_at', 'desc')->get()->groupBy('type');

        return view('news.index', compact('news'));
    }

    public function create()
    {
        $categories = FAQCategory::all();
        return view('faq.edit', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string',
            'answer' => 'required|string',
            'order' => 'integer|nullable',
        ]);

        FAQ::create([
            'faq_category_id' => $request->category_id,
            'question' => $request->question,
            'answer' => $request->answer,
            'is_published' => $request->is_published ?? true,
        ]);

        return redirect()->route('faq.index')
            ->with('success', 'FAQ created!');
    }

    public function edit(FAQ $faq)
    {
        $categories = FAQCategory::all();
        return view('faq.edit', compact('faq', 'categories'));
    }

    public function update(Request $request, FAQ $faq)
    {
        $request->validate([
            'category_id' => 'required|exists:faq_categories,id',
            'question' => 'required|string',
            'answer' => 'required|string',
            'order' => 'integer|nullable',
        ]);

        $faq->update($request->all());

        return redirect()->route('faq-categories.show')
            ->with('success', 'FAQ updated!');
    }

    public function destroy(FAQ $faq)
    {
        $faq->delete();
        return back()->with('success', 'FAQ deleted!');
    }
}
