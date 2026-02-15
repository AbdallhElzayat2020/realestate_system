<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    /**
     * Show the profile edit form.
     */
    public function edit()
    {
        $user = Auth::user();
        return view('dashboard.pages.profile.edit', compact('user'));
    }

    /**
     * Update the user's profile.
     */
    public function update(UpdateProfileRequest $request)
    {
        $user = Auth::user();

        $data = $request->validated();

        // If password is provided, hash it
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            // Remove password from data if not provided
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('dashboard.profile.edit')->with('success', 'Profile updated successfully');
    }
}
