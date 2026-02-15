<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the quotes.
     */
    public function index()
    {
        $quotes = Quote::latest()->paginate(15);
        return view('dashboard.pages.quotes.index', compact('quotes'));
    }

    /**
     * Display the specified quote.
     */
    public function show(Quote $quote)
    {
        return view('dashboard.pages.quotes.show', compact('quote'));
    }

    /**
     * Remove the specified quote from storage.
     */
    public function destroy(Quote $quote)
    {
        $quote->delete();

        return redirect()->route('dashboard.quotes.index')
            ->with('success', 'Quote deleted successfully');
    }
}
