<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category; 
use App\Models\Blog;
use App\Models\BlogImage;

class BlogController extends Controller
{
    public function index()
    {
        $title = "Blogs";
        $blogs = Blog::latest()->get();
        
        return view('admin.blog.index', compact('blogs', 'title'));
    }

    public function create()
    {
        $title = "Create Blog";
        $categories = Category::latest()->get();
        return view('admin.blog.form', compact('categories', 'title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        
        $path = str_replace(env('REP_FROM_FOLDER_IMG', 'appdigitalelitecheck')."/public", env('REP_TO_FOLDER_IMG', "digitalelitecheck.com"), public_path('blogs'));
        
        $data = $request->except(['images']);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move($path, $imageName);
        $data['user_id'] = auth()->user()->id;
        $data['slug'] = \Str::slug($request->title);
        $data['image'] = 'blogs/'.$imageName;
        $blog = Blog::create($data);

        if($request->hasFile('images')) {
            foreach($request->images as $key => $img) {
                $imageName = time().'_'.$key.'.'.$img->extension();
                $img->move($path, $imageName);
                BlogImage::create([
                    'blog_id' => $blog->id,
                    'url' => 'blogs/'.$imageName
                ]);
            }
        }

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog created successfully.');
    }

    public function edit(Blog $blog)
    {
        $title = "Edit Blog";
        $blog->load('images');
        $categories = Category::latest()->get();
        return view('admin.blog.form', compact('blog', 'categories', 'title'));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg'
        ]);

        $data = $request->except(['images']);
        if($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $path = str_replace(env('REP_FROM_FOLDER_IMG', 'appdigitalelitecheck')."/public", env('REP_TO_FOLDER_IMG', "digitalelitecheck.com"), public_path('blogs'));
            $request->image->move($path, $imageName);
        }
        $data['image'] = isset($imageName) ? 'blogs/'.$imageName : $blog->image;
        $data['slug'] = \Str::slug($request->title);
        $blog->update($data);

        if($request->hasFile('images')) {
            $path = str_replace(env('REP_FROM_FOLDER_IMG', 'appdigitalelitecheck')."/public", env('REP_TO_FOLDER_IMG', "digitalelitecheck.com"), public_path('blogs'));
            foreach($request->images as $key => $img) {
                $imageName = time().'_'.$key.'.'.$img->extension();
                $img->move($path, $imageName);
                BlogImage::create([
                    'blog_id' => $blog->id,
                    'url' => 'blogs/'.$imageName
                ]);
            }
        }
    
        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog updated successfully');
    }

    public function destroy($id)
    {
        
        $blog = Blog::findOrFail($id);
        $blog->delete();
    
        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog deleted successfully');
    }

    public function destoryImage($id){
        $blog = BlogImage::findOrFail($id);
        $blog->delete();
        return redirect()->back()->with('success', 'Image deleted successfully');
    }
}   