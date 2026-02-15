<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = Project::active()->with('service')->orderBy('created_at', 'desc')->get();
        return view('website.pages.projects', compact('projects'));
    }

    public function show(Project $project)
    {
        if ($project->status !== 'active') {
            abort(404);
        }
        $project->load('service');
        return view('website.pages.project-details', compact('project'));
    }
}
