<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;


class PagesController extends Controller
{

    function contactus(){
        return view('pages.contactus');
    }

    public function pricePage($value='')
    {
    	return view('pages.pricing');
    }

    public function sampleReport($value='')
    {
        return view('pages.sample-report');
    }

    public function deliveryPolicy($value='')
    {
        return view('pages.delivery-policy');
    }

    public function terms($value='')
    {
    	return view('pages.terms');
    }
    public function privacypolicy($value='')
    {
    	return view('pages.privacypolicy');
    }
    public function refundpolicy($value='')
    {
    	return view('pages.refundpolicy');
    }
	
    public function blogs(Request $request)
    { 
        $cat = $request->category;
        $category = Category::where('slug', $cat)->first();

        $blogs = Blog::where('status', 1)->when($category, function($q) use ($category){
            $q->where('category_id', $category->id);
        })->paginate();
        $categories = Category::where('status', 1)->get();
    	return view('pages.blogs', compact('blogs', 'categories'));
    }

    public function singleBlog($slug)
    {
        $blog = Blog::with('images', 'category')->where('slug', $slug)->first();
        if(!$blog)
            return redirect()->route('blogs');
        
        $resentBlogs = Blog::with('category')->where('status', 1)->where('id', '!=', $blog->id)->latest()->take(5)->get();

        return view('pages.single-blog', compact('blog', 'resentBlogs'));

    }
}
