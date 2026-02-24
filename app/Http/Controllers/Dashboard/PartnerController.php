<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePartnerRequest;
use App\Http\Requests\UpdatePartnerRequest;
use App\Models\Partner;
use Illuminate\Support\Facades\File;

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::orderBy('order')->orderBy('created_at', 'desc')->paginate(15);
        return view('dashboard.pages.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('dashboard.pages.partners.create');
    }

    public function store(StorePartnerRequest $request)
    {
        $data = $request->validated();
        $partner = new Partner();
        $partner->name = $data['name'];
        $partner->status = $data['status'];
        $partner->link = $data['link'] ?? null;
        $partner->order = (int) ($data['order'] ?? 0);

        $dir = public_path('partners');
        if (!File::exists($dir)) {
            File::makeDirectory($dir, 0755, true);
        }
        if ($request->hasFile('logo')) {
            $filename = 'logo_' . time() . '_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move($dir, $filename);
            $partner->logo = 'partners/' . $filename;
        }
        $partner->save();
        return redirect()->route('dashboard.partners.index')->with('success', 'Partner created successfully.');
    }

    public function edit(Partner $partner)
    {
        return view('dashboard.pages.partners.edit', compact('partner'));
    }

    public function update(UpdatePartnerRequest $request, Partner $partner)
    {
        $data = $request->validated();
        $partner->name = $data['name'];
        $partner->status = $data['status'];
        $partner->link = $data['link'] ?? null;
        $partner->order = (int) ($data['order'] ?? 0);

        $dir = public_path('partners');
        if (!File::exists($dir)) {
            File::makeDirectory($dir, 0755, true);
        }
        // Remove existing logo if requested
        if ($request->boolean('remove_logo') && $partner->logo && File::exists(public_path($partner->logo))) {
            File::delete(public_path($partner->logo));
            $partner->logo = null;
        }
        // Upload new logo if provided
        if ($request->hasFile('logo')) {
            if ($partner->logo && File::exists(public_path($partner->logo))) {
                File::delete(public_path($partner->logo));
            }
            $filename = 'logo_' . time() . '_' . $request->file('logo')->getClientOriginalName();
            $request->file('logo')->move($dir, $filename);
            $partner->logo = 'partners/' . $filename;
        }
        $partner->save();
        return redirect()->route('dashboard.partners.index')->with('success', 'Partner updated successfully.');
    }

    public function destroy(Partner $partner)
    {
        if ($partner->logo && File::exists(public_path($partner->logo))) {
            File::delete(public_path($partner->logo));
        }
        $partner->delete();
        return redirect()->route('dashboard.partners.index')->with('success', 'Partner deleted successfully.');
    }
}
