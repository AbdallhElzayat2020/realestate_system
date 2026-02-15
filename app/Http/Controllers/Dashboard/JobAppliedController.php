<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobAppliedController extends Controller
{
    /**
     * Display a listing of the job applications.
     */
    public function index()
    {
        $applications = JobApplication::latest()->paginate(15);
        return view('dashboard.pages.job_applications.index', compact('applications'));
    }

    /**
     * Display the specified job application.
     */
    public function show(JobApplication $application)
    {
        return view('dashboard.pages.job_applications.show', compact('application'));
    }

    /**
     * Remove the specified job application from storage.
     */
    public function destroy(JobApplication $application)
    {
        $application->delete();

        return redirect()->route('dashboard.job-applications.index')
            ->with('success', 'Application deleted successfully');
    }
}
