<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Newsitem;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        $newsitems = Newsitem::all();
        return view('admin.newsitems', compact('newsitems'));
    }

    public function create()
    {
        return view('admin.newsitems.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'publication_date' => 'required|date',
        ]);

        $newsItem = new NewsItem($validated);

        if ($request->hasFile('picture')) {
            $newsItem->picture = $request->file('picture')->store('news_pictures', 'public');
        }

        $newsItem->save();

        return redirect()->route('admin.newsitems.index')->with('success', 'News item created successfully.');
    }

    public function edit($id)
    {
        $newsitem = NewsItem::findOrFail($id);
        return view('admin.newsitems.edit', compact('newsitem'));
    }

    public function update(Request $request, $id)
    {
        $newsitem = NewsItem::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'picture' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',
            'publication_date' => 'required|date',
        ]);

        $newsitem->fill($validated);

        if ($request->hasFile('picture')) {
            if ($newsitem->picture) {
                Storage::disk('public')->delete($newsitem->picture);
            }
            $newsitem->picture = $request->file('picture')->store('news_pictures', 'public');
        }

        $newsitem->save();

        return redirect()->route('admin.newsitems.index')->with('success', 'News item updated successfully.');
    }

    public function destroy($id)
    {
        $newsitem = NewsItem::findOrFail($id);

        if ($newsitem->picture) {
            Storage::disk('public')->delete($newsitem->picture);
        }

        $newsitem->delete();

        return redirect()->route('admin.newsitems.index')->with('success', 'News item deleted successfully.');
    }
}