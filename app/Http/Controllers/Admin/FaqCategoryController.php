<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FAQCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FaqCategoryController extends Controller
{
    public function index()
    {
        $categories = FAQCategory::all();
        return view('admin.faq_categories.index', compact('categories'));
    }

    public function create(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
        return view('faq.edit-category');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:faq_categories,name',
        ]);

        FAQCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('admin.faq-categories.index')
            ->with('success', 'Category created!');
    }

    public function edit()
    {
        return view('admin.faq_categories.edit');
    }

    public function update(Request $request, FAQCategory $faqCategory)
    {
        $request->validate([
            'name' => 'required|string|unique:faq_categories,name,' . $faqCategory->id,
        ]);

        $faqCategory->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('admin.faq-categories.index')
            ->with('success', 'Category updated!');
    }

    public function destroy(FAQCategory $faqCategory)
    {
        $faqCategory->delete();
        return back()->with('success', 'Category deleted!');
    }
}

