<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use App\Models\Project;
use App\Models\Service;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    private function uploadDir(): string
    {
        $dir = public_path('projects');
        if (!File::exists($dir)) {
            File::makeDirectory($dir, 0755, true);
        }
        return $dir;
    }

    public function index()
    {
        $projects = Project::with('service')->latest()->paginate(15);
        return view('dashboard.pages.projects.index', compact('projects'));
    }

    public function create()
    {
        $services = Service::active()->orderBy('created_at')->get();
        return view('dashboard.pages.projects.create', compact('services'));
    }

    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();
        $project = new Project();
        $project->status = $data['status'];
        $project->project_state = $data['project_state'] ?? null;
        $project->service_id = $data['service_id'] ?? null;
        $project->setTranslations('name', $data['name']);
        $project->setTranslations('description', $data['description'] ?? []);
        $project->slug = !empty($data['slug']) ? $data['slug'] : Project::generateUniqueSlug($data['name']['en']);
        $project->map = $data['map'] ?? null;
        $project->tags = $this->parseTags($data['tags'] ?? '');

        $dir = $this->uploadDir();
        if ($request->hasFile('thumbnail')) {
            $path = 'projects/' . $this->saveFile($request->file('thumbnail'), $dir, 'main');
            $project->thumbnail = $path;
            $project->banner = $path;
            $project->main_image = $path;
        }
        $images = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $images[] = 'projects/' . $this->saveFile($file, $dir, 'img');
            }
        }
        $project->images = $images;
        if ($request->hasFile('brochure')) {
            $project->brochure = 'projects/' . $this->saveFile($request->file('brochure'), $dir, 'brochure');
        }
        $project->save();

        return redirect()->route('dashboard.projects.index')->with('success', 'Project created successfully.');
    }

    public function show(Project $project)
    {
        return view('dashboard.pages.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        $services = Service::active()->orderBy('created_at')->get();
        return view('dashboard.pages.projects.edit', compact('project', 'services'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validated();
        $project->status = $data['status'];
        $project->project_state = $data['project_state'] ?? null;
        $project->service_id = $data['service_id'] ?? null;
        $project->setTranslations('name', $data['name']);
        $project->setTranslations('description', $data['description'] ?? []);
        if (!empty($data['slug'])) {
            $project->slug = $data['slug'];
        } else {
            $project->slug = Project::generateUniqueSlug($data['name']['en']);
        }
        $project->map = $data['map'] ?? null;
        $project->tags = $this->parseTags($data['tags'] ?? '');

        $dir = $this->uploadDir();

        // Handle removing current main image if requested
        if ($request->boolean('remove_thumbnail')) {
            $this->deleteFile($project->thumbnail);
            $this->deleteFile($project->banner);
            $this->deleteFile($project->main_image);
            $project->thumbnail = null;
            $project->banner = null;
            $project->main_image = null;
        }

        // Replace main image if a new file is uploaded
        if ($request->hasFile('thumbnail')) {
            $this->deleteFile($project->thumbnail);
            $this->deleteFile($project->banner);
            $this->deleteFile($project->main_image);
            $path = 'projects/' . $this->saveFile($request->file('thumbnail'), $dir, 'main');
            $project->thumbnail = $path;
            $project->banner = $path;
            $project->main_image = $path;
        }

        // Start from existing gallery images
        $images = $project->images ?? [];

        // Remove selected gallery images
        $imagesToRemove = (array) $request->input('remove_images', []);
        if (!empty($imagesToRemove) && !empty($images)) {
            foreach ($imagesToRemove as $removePath) {
                if (in_array($removePath, $images, true)) {
                    $this->deleteFile($removePath);
                }
            }
            $images = array_values(array_filter($images, function ($img) use ($imagesToRemove) {
                return !in_array($img, $imagesToRemove, true);
            }));
        }

        // Append newly uploaded gallery images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $file) {
                $images[] = 'projects/' . $this->saveFile($file, $dir, 'img');
            }
        }

        $project->images = $images;

        if ($request->boolean('remove_brochure')) {
            $this->deleteFile($project->brochure);
            $project->brochure = null;
        }
        if ($request->hasFile('brochure')) {
            $this->deleteFile($project->brochure);
            $project->brochure = 'projects/' . $this->saveFile($request->file('brochure'), $dir, 'brochure');
        }

        $project->save();

        return redirect()->route('dashboard.projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy(Project $project)
    {
        $mainPaths = array_unique(array_filter([$project->thumbnail, $project->banner, $project->main_image]));
        foreach ($mainPaths as $path) {
            $this->deleteFile($path);
        }
        if ($project->images) {
            foreach ($project->images as $path) {
                $this->deleteFile($path);
            }
        }
        $this->deleteFile($project->brochure);
        $project->delete();
        return redirect()->route('dashboard.projects.index')->with('success', 'Project deleted successfully.');
    }

    private function parseTags(?string $tags): array
    {
        if (empty($tags)) {
            return [];
        }
        return array_values(array_unique(array_map('trim', preg_split('/[,،]+/u', $tags))));
    }

    private function saveFile($file, string $dir, string $prefix): string
    {
        $name = $prefix . '_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($dir, $name);
        return $name;
    }

    private function deleteFile(?string $path): void
    {
        if ($path && File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}
