<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NewsItem;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth; // Make sure this is imported

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

    public function showUserNews()
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
    
        // Get the authenticated user ID
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
        return redirect()->route('admin.newsitems.index')->with('success', 'News item created successfully!');
    }

    // Admin: Show details of a news item
    public function show(NewsItem $newsItem)
    {
        return view('admin.show', compact('newsItem'));
    }

    // Admin: Edit news item
    public function edit($id)
    {
        $newsItem = NewsItem::findOrFail($id);
        return view('admin.edit', compact('newsItem'));
    }

    // Admin: Update news item
    public function update(Request $request, $id)
    {
        $newsItem = NewsItem::findOrFail($id);
        // Validate the form data
        $validated = $request->validate([
            'title' => 'required|max:255',
            'picture' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'content' => 'required',
            'publication_date' => 'required|date',
        ]);
    
        // Check if a new image is uploaded
        if ($request->hasFile('picture')) {
        
            // Delete the old image if it exists
            if ($newsItem->image && Storage::exists('public/' . $newsItem->image)) {
                Storage::delete('public/' . $newsItem->image);
            }
    
            // Upload the new image
            $imagePath = $request->file('picture')->store('images', 'public');
            $newsItem->image = $imagePath;
        }
    
        // Update other fields
        $newsItem->title = $validated['title'];
        $newsItem->content = $validated['content'];
        $newsItem->publication_date = $validated['publication_date'];
    
        // Save the updated news item
        $newsItem->save();
    
        // Redirect with success message
        return redirect()->route('admin.newsitems.index')->with('success', 'News item updated successfully!');
    }

    // Admin: Delete news item
    public function destroy($id)
    {
        $newsItem = NewsItem::findOrFail($id);
        // Delete the image from storage if it exists
        if ($newsItem->image && Storage::exists('public/' . $newsItem->image)) {
            Storage::delete('public/' . $newsItem->image);
        }

        // Delete the news item
        $newsItem->delete();

        // Redirect with success message
        return redirect()->route('admin.newsitems.index')->with('success', 'News item deleted successfully!');
    }
}
