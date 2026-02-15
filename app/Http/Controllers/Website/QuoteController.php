<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuoteRequest;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        return view('website.pages.quote');
    }

    /**
     * Store a newly created quote request.
     */
    public function store(StoreQuoteRequest $request)
    {
        try {
            Quote::create($request->validated());

            return redirect()->back()->with('success', __('quote.success'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', __('quote.error'));
        }
    }
}
