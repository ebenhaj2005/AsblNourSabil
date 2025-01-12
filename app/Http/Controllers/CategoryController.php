<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function view()
    {
        $categories = Category::all();
        return view('faq', compact('categories'));
    }
    public function index()
    {
        $categories = Category::all();
        return view('admin.category', compact('categories'));
    }

    public function create()
    {
        return view('admin.categorycreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        Category::create($request->all());
        return redirect()->route('admin.categories.index')->with('success', 'Categorie succesvol toegevoegd.');
    }

    public function edit(Category $category)
    {
        return view('admin.categoryedit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id . '|max:255',
        ]);

        $category->update($request->all());
        return redirect()->route('admin.categories.index')->with('success', 'Categorie succesvol bijgewerkt.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Categorie succesvol verwijderd.');
    }
}
