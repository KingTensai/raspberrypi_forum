<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the news.
     */
    public function index()
    {
        $news = News::latest()->paginate(10); // paginated list
        return view('news.index', compact('news'));
    }

    /**
     * Show the form for creating a new news item.
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created news item in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048', // optional image
        ]);

        $news = new News();
        $news->title = $request->title;
        $news->content = $request->content;
        $news->user_id = auth()->id();

        if ($request->hasFile('image')) {
            $news->image = $request->file('image')->store('news_images', 'public');
        }

        $news->save();

        return redirect()->route('news.index')->with('success', 'News created successfully.');
    }

    /**
     * Display the specified news item.
     */
    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }

    /**
     * Show the form for editing the specified news item.
     */
    public function edit(News $news)
    {
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified news item in storage.
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $news->title = $request->title;
        $news->content = $request->content;

        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $news->image = $request->file('image')->store('news_images', 'public');
        }

        $news->save();

        return redirect()->route('news.index')->with('success', 'News updated successfully.');
    }

    /**
     * Remove the specified news item from storage.
     */
    public function destroy(News $news)
    {
        // Delete image if exists
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return redirect()->route('news.index')->with('success', 'News deleted successfully.');
    }
}
