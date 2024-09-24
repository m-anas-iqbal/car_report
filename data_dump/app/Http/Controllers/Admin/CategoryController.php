<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category; 

class CategoryController extends Controller
{
    public function index()
    {   
        $title = "Categories";
        $categories = Category::latest()->get();
        return view('admin.category.index', compact('categories', 'title'));
    }

    public function create()
    {
        $title = "Create Category";
        return view('admin.category.form', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        
        $data = $request->all();
        $data['slug'] = \Str::slug($request->name);
        Category::create($data);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        $title = "Edit Category";
        return view('admin.category.form', compact('category', 'title'));
    }

    public function update(Category $category, Request $request){
        $request->validate([
            'name' => 'required',
        ]);

        $data = $request->all();
        $data['slug'] = \Str::slug($request->name);
        $category->update($data);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Category deleted successfully');
    }
}