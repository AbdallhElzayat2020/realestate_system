<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFaqRequest;
use App\Http\Requests\UpdateFaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::latest()->paginate(15);

        return view('dashboard.pages.faqs.index', compact('faqs'));
    }

    public function show(Faq $faq)
    {
        return view('dashboard.pages.faqs.show', compact('faq'));
    }

    public function create()
    {
        $statuses = Faq::statuses();

        return view('dashboard.pages.faqs.create', compact('statuses'));
    }

    public function store(StoreFaqRequest $request)
    {
        Faq::create($request->validated());

        return redirect()->route('dashboard.faqs.index')->with('success', 'FAQ created successfully');
    }

    public function edit(Faq $faq)
    {
        $statuses = Faq::statuses();

        return view('dashboard.pages.faqs.edit', compact('faq', 'statuses'));
    }

    public function update(UpdateFaqRequest $request, Faq $faq)
    {
        $faq->update($request->validated());

        return redirect()->route('dashboard.faqs.index')->with('success', 'FAQ updated successfully');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('dashboard.faqs.index')->with('success', 'FAQ deleted successfully');
    }
}
