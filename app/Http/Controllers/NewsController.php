<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsItem;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    // Admin: View all news items
    public function index()
    {
        // Fetch all news items
        $newsitems = NewsItem::all();

        // Pass the data to the view
        return view('admin.newsitems', compact('newsitems'));
    }

    public function showUserNews(NewsItem $newsItem)
    {
        $newsItems = NewsItem::all(); 
        return view('news', compact('newsItems'));
    }

    // Admin: Form for creating a new news item
    public function create()
    {
        return view('admin.create');
    }

    // Admin: Store new news item
    public function store(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'title' => 'required|max:255',
            'picture' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'content' => 'required',
            'publication_date' => 'required|date',
        ]);
    
        // Get the authenticated user ID (if applicable)
        $userId = auth()->id();  // Get the ID of the currently authenticated user
    
        // Upload the image
        $imagePath = $request->file('picture')->store('images', 'public');
    
        // Create the news item with the user ID
        NewsItem::create([
            'title' => $validated['title'],
            'image' => $imagePath,
            'content' => $validated['content'],
            'publication_date' => $validated['publication_date'],
            'user_id' => $userId,  // Add the user ID here
        ]);
    
        // Redirect with success message
        return redirect()->route('admin.newsitems')->with('success', 'News item created successfully!');
    }

    // Admin: Show details of a news item
    public function show(NewsItem $newsItem)
    {
        return view('admin.show', compact('newsItem'));
    }

    // Admin: Edit news item
    public function edit(NewsItem $newsItem)
    {
        return view('admin.edit', compact('newsItem'));
    }

    // Admin: Update news item
    public function update(Request $request, NewsItem $newsItem)
    {
        // Validate the form data
        $validated = $request->validate([
            'title' => 'required|max:255',
            'picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Fixed 'image' to 'picture'
            'content' => 'required',
            'publication_date' => 'required|date',
        ]);

        // Check for a new image upload
        if ($request->hasFile('picture')) {
            $imagePath = $request->file('picture')->store('images', 'public');
            $newsItem->update(['image' => $imagePath]);
        }

        // Update the news item details
        $newsItem->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'publication_date' => $validated['publication_date'],
        ]);

        // Redirect with success message
        return redirect()->route('admin.newsitems')->with('success', 'News item updated successfully!');
    }

    // Admin: Delete news item
    public function destroy(NewsItem $newsItem)
    {
        // Delete the image from storage if it exists
        if ($newsItem->image && Storage::exists('public/' . $newsItem->image)) {
            Storage::delete('public/' . $newsItem->image);
        }

        // Delete the news item
        $newsItem->delete();

        // Redirect with success message
        return redirect()->route('admin.newsitems')->with('success', 'News item deleted successfully!');
    }
}
