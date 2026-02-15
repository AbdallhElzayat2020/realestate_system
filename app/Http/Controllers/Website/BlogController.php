<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::active()->latest()->paginate(12);
        return view('website.pages.blogs', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        if ($blog->status !== 'active') {
            abort(404);
        }
        $relatedBlogs = Blog::active()->where('id', '!=', $blog->id)->latest()->take(3)->get();
        return view('website.pages.blog-show', compact('blog', 'relatedBlogs'));
    }
}
