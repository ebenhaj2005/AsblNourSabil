<?php


namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\Category;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function view()
    {
         $categories = Category::with('faqs')->get(); 
        return view('contact', compact('categories'));
    }
    public function index()
    {
      
        return view('admin.faq', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.createfaq', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        Faq::create($request->all());
        return redirect()->route('faqs.index')->with('success', 'FAQ created successfully.');
    }

    public function edit(Faq $faq)
    {
        $categories = Category::all();
        return view('admin.editfaq', compact('faq', 'categories'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);

        $faq->update($request->all());
        return redirect()->route('faqs.index')->with('success', 'FAQ updated successfully.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('faqs.index')->with('success', 'FAQ deleted successfully.');
    }
}
