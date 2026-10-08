<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

/**
 * Every logged-in user manages ONLY their own profile (user hasOne profile),
 * so there is no {id} in these routes and no index() list.
 */
class ProfileController extends Controller
{
    public function show(Request $request)
    {
        $user = $request->user();

        return view('profile.show', [
            'user'    => $user,
            'profile' => $user->profile,
        ]);
    }

    public function create(Request $request)
    {
        if ($request->user()->profile) {
            return redirect()->route('profile.edit');
        }

        return view('profile.create');
    }

    public function store(Request $request)
    {
        if ($request->user()->profile) {
            return redirect()->route('profile.show')->with('error', 'You already have a profile.');
        }

        $data = $this->validated($request);

        if ($request->hasFile('profile_image')) {
            $data['profile_image'] = $request->file('profile_image')->store('profiles', 'public');
        }

        $request->user()->profile()->create($data);

        return redirect()->route('profile.show')->with('success', 'Profile created successfully.');
    }

    public function edit(Request $request)
    {
        $profile = $request->user()->profile;

        if (! $profile) {
            return redirect()->route('profile.create');
        }

        return view('profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = $request->user()->profile;

        if (! $profile) {
            return redirect()->route('profile.create');
        }

        $data = $this->validated($request);

        if ($request->hasFile('profile_image')) {
            if ($profile->profile_image) {
                Storage::disk('public')->delete($profile->profile_image);
            }
            $data['profile_image'] = $request->file('profile_image')->store('profiles', 'public');
        }

        $profile->update($data);

        return redirect()->route('profile.show')->with('success', 'Profile updated successfully.');
    }

    public function destroy(Request $request)
    {
        $profile = $request->user()->profile;

        if ($profile) {
            if ($profile->profile_image) {
                Storage::disk('public')->delete($profile->profile_image);
            }
            $profile->delete();
        }

        return redirect()->route('profile.show')->with('success', 'Profile deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'phone'         => ['nullable', 'string', 'max:30'],
            'address'       => ['nullable', 'string', 'max:500'],
            'profile_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);
    }
}
