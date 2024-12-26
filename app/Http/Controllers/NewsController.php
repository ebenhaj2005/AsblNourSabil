<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
  public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'publication_date' => 'required|date',
    ]);

    $path = null;
    if ($request->hasFile('picture')) {
        $path = $request->file('picture')->store('news_pictures', 'public');
    }

    NewsItem::create([
        'title' => $request->title,
        'content' => $request->content,
        'picture' => $path,
        'publication_date' => $request->publication_date,
        'user_id' => auth()->id(),
    ]);

    return redirect()->route('news')->with('success', 'News item created successfully!');
}
}
