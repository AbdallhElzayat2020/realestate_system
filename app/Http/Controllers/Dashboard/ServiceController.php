<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use Illuminate\Support\Facades\File;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::latest()->paginate(15);
        return view('dashboard.pages.services.index', compact('services'));
    }

    public function show(Service $service)
    {
        return view('dashboard.pages.services.show', compact('service'));
    }

    public function create()
    {
        return view('dashboard.pages.services.create');
    }

    public function store(StoreServiceRequest $request)
    {
        $data = $request->validated();
        $service = new Service();
        $service->status = $data['status'] ?? 'active';
        $service->setTranslations('name', $data['name']);
        $service->setTranslations('description', $data['description'] ?? []);
        $service->slug = !empty($data['slug']) ? $data['slug'] : Service::generateUniqueSlug($data['name']['en']);

        $dir = public_path('services');
        if (!File::exists($dir)) {
            File::makeDirectory($dir, 0755, true);
        }
        if ($request->hasFile('thumbnail')) {
            $filename = 'thumb_' . time() . '_' . $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->move($dir, $filename);
            $service->thumbnail = 'services/' . $filename;
        }
        if ($request->hasFile('banner')) {
            $filename = 'banner_' . time() . '_' . $request->file('banner')->getClientOriginalName();
            $request->file('banner')->move($dir, $filename);
            $service->banner = 'services/' . $filename;
        }
        $service->save();
        return redirect()->route('dashboard.services.index')->with('success', 'Service created successfully');
    }

    public function edit(Service $service)
    {
        return view('dashboard.pages.services.edit', compact('service'));
    }

    public function update(UpdateServiceRequest $request, Service $service)
    {
        $data = $request->validated();
        $service->status = $data['status'] ?? $service->status;
        $service->setTranslations('name', $data['name']);
        $service->setTranslations('description', $data['description'] ?? []);
        if (!empty($data['slug'])) {
            $service->slug = $data['slug'];
        } else {
            $service->slug = Service::generateUniqueSlug($data['name']['en']);
        }

        $dir = public_path('services');
        if (!File::exists($dir)) {
            File::makeDirectory($dir, 0755, true);
        }
        if ($request->hasFile('thumbnail')) {
            if ($service->thumbnail && File::exists(public_path($service->thumbnail))) {
                File::delete(public_path($service->thumbnail));
            }
            $filename = 'thumb_' . time() . '_' . $request->file('thumbnail')->getClientOriginalName();
            $request->file('thumbnail')->move($dir, $filename);
            $service->thumbnail = 'services/' . $filename;
        }
        if ($request->hasFile('banner')) {
            if ($service->banner && File::exists(public_path($service->banner))) {
                File::delete(public_path($service->banner));
            }
            $filename = 'banner_' . time() . '_' . $request->file('banner')->getClientOriginalName();
            $request->file('banner')->move($dir, $filename);
            $service->banner = 'services/' . $filename;
        }
        $service->save();
        return redirect()->route('dashboard.services.index')->with('success', 'Service updated successfully');
    }

    public function destroy(Service $service)
    {
        if ($service->thumbnail && File::exists(public_path($service->thumbnail))) {
            File::delete(public_path($service->thumbnail));
        }
        if ($service->banner && File::exists(public_path($service->banner))) {
            File::delete(public_path($service->banner));
        }
        $service->delete();
        return redirect()->route('dashboard.services.index')->with('success', 'Service deleted successfully');
    }
}
