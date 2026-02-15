<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBlogRequest;
use App\Http\Requests\UpdateBlogRequest;
use App\Models\Blog;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->paginate(15);
        return view('dashboard.pages.blogs.index', compact('blogs'));
    }

    public function show(Blog $blog)
    {
        return view('dashboard.pages.blogs.show', compact('blog'));
    }

    public function create()
    {
        return view('dashboard.pages.blogs.create');
    }

    public function store(StoreBlogRequest $request)
    {
        $data = $request->validated();
        $blog = new Blog();
        $blog->status = $data['status'] ?? 'active';
        $blog->show_on_home = $data['show_on_home'] ?? false;
        $blog->setTranslations('title', $data['title']);
        $blog->setTranslations('content', $data['content'] ?? []);
        $blog->slug = !empty($data['slug']) ? $data['slug'] : Blog::generateUniqueSlug($data['title']['en']);

        if ($request->hasFile('image')) {
            $dir = public_path('blogs');
            if (!File::exists($dir)) {
                File::makeDirectory($dir, 0755, true);
            }
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move($dir, $filename);
            $blog->image = 'blogs/' . $filename;
        }
        $blog->save();
        return redirect()->route('dashboard.blogs.index')->with('success', 'Blog post created successfully');
    }

    public function edit(Blog $blog)
    {
        return view('dashboard.pages.blogs.edit', compact('blog'));
    }

    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $data = $request->validated();
        $blog->status = $data['status'] ?? $blog->status;
        $blog->show_on_home = $data['show_on_home'] ?? false;
        $blog->setTranslations('title', $data['title']);
        $blog->setTranslations('content', $data['content'] ?? []);
        if (!empty($data['slug'])) {
            $blog->slug = $data['slug'];
        } else {
            $blog->slug = Blog::generateUniqueSlug($data['title']['en']);
        }

        if ($request->hasFile('image')) {
            $dir = public_path('blogs');
            if (!File::exists($dir)) {
                File::makeDirectory($dir, 0755, true);
            }
            if ($blog->image && File::exists(public_path($blog->image))) {
                File::delete(public_path($blog->image));
            }
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move($dir, $filename);
            $blog->image = 'blogs/' . $filename;
        }
        $blog->save();
        return redirect()->route('dashboard.blogs.index')->with('success', 'Blog post updated successfully');
    }

    public function destroy(Blog $blog)
    {
        if ($blog->image && File::exists(public_path($blog->image))) {
            File::delete(public_path($blog->image));
        }
        $blog->delete();
        return redirect()->route('dashboard.blogs.index')->with('success', 'Blog post deleted successfully');
    }
}
