<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJobApplicationRequest;
use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    public function index()
    {
        return view('website.pages.jobs');
    }

    public function store(StoreJobApplicationRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('resume')) {
            $path = $request->file('resume')->store('resumes', 'public');
            $data['resume'] = $path;
        }

        JobApplication::create($data);

        return back()->with('success', __('jobs.submit_success'));
    }
}
