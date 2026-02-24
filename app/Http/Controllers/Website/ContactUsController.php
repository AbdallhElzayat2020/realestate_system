<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactRequest;
use App\Mail\ContactMessageMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


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
     * Store a newly created contact message.
     */
    public function store(StoreContactRequest $request)
    {
        try {
            $contact = Contact::create($request->validated());

            // Send notification email to main contact address
            $to = config('site.email', 'contact@bazigha.com');
            Mail::to($to)->send(new ContactMessageMail($contact));

            return redirect()->back()->with('success', __('contact-us.success'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', __('contact-us.error'));
        }
    }
}
