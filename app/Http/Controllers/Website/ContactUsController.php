<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Models\Contact;

class ContactUsController extends Controller
{
    /**
     * Display the contact us page.
     */
    public function index()
    {
        return view('website.pages.contact-us');
    }

    /**
     * Store a newly created contact message (saved for admin in dashboard only, no email sent).
     */
    public function store(StoreContactRequest $request)
    {
        try {
            Contact::create($request->validated());

            return redirect()->back()->with('success', __('contact-us.success'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', __('contact-us.error'));
        }
    }
}
