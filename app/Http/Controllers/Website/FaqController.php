<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::where('status', Faq::STATUS_ACTIVE)
            ->latest()
            ->get();

        return view('website.pages.faq', compact('faqs'));
    }
}
