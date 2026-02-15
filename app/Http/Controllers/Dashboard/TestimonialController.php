<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTestimonialRequest;
use App\Http\Requests\UpdateTestimonialRequest;
use App\Models\Testimonial;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::orderBy('order')->orderBy('created_at', 'desc')->paginate(15);
        return view('dashboard.pages.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('dashboard.pages.testimonials.create');
    }

    public function store(StoreTestimonialRequest $request)
    {
        $data = $request->validated();
        $testimonial = new Testimonial();
        $testimonial->status = $data['status'];
        $testimonial->order = (int) ($data['order'] ?? 0);
        $testimonial->setTranslations('name', $data['name']);
        $testimonial->setTranslations('role', $data['role'] ?? []);
        $testimonial->setTranslations('content', $data['content']);

        $dir = public_path('testimonials');
        if (!File::exists($dir)) {
            File::makeDirectory($dir, 0755, true);
        }
        if ($request->hasFile('image')) {
            $filename = 'img_' . time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move($dir, $filename);
            $testimonial->image = 'testimonials/' . $filename;
        }
        $testimonial->save();
        return redirect()->route('dashboard.testimonials.index')->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('dashboard.pages.testimonials.edit', compact('testimonial'));
    }

    public function update(UpdateTestimonialRequest $request, Testimonial $testimonial)
    {
        $data = $request->validated();
        $testimonial->status = $data['status'];
        $testimonial->order = (int) ($data['order'] ?? 0);
        $testimonial->setTranslations('name', $data['name']);
        $testimonial->setTranslations('role', $data['role'] ?? []);
        $testimonial->setTranslations('content', $data['content']);

        $dir = public_path('testimonials');
        if (!File::exists($dir)) {
            File::makeDirectory($dir, 0755, true);
        }
        if ($request->hasFile('image')) {
            if ($testimonial->image && File::exists(public_path($testimonial->image))) {
                File::delete(public_path($testimonial->image));
            }
            $filename = 'img_' . time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move($dir, $filename);
            $testimonial->image = 'testimonials/' . $filename;
        }
        $testimonial->save();
        return redirect()->route('dashboard.testimonials.index')->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->image && File::exists(public_path($testimonial->image))) {
            File::delete(public_path($testimonial->image));
        }
        $testimonial->delete();
        return redirect()->route('dashboard.testimonials.index')->with('success', 'Testimonial deleted successfully.');
    }
}
