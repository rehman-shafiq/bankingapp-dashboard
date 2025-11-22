<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    public function settingsView(): View
    {
        return view('setting');
    }

    public function uploadProfilePictureAction(): RedirectResponse
    {
        //dd(request()->profile_picture->getFileName());

        $valiadatedData = request()->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg|max:2048', // max 2MB
        ]);

        $filePath =  Storage::disk('public')->putFile('profile_pictures', new File($valiadatedData['profile_picture']->getRealPath()));

        User::where('id', '=', Auth::user()->id)->update([
            'profile_picture' => pathinfo($filePath, PATHINFO_BASENAME),
        ]);
        return redirect()->route('dashboard.view');
        return back()->with('status', 'Profile picture updated successfully.');
    }

    public function updateProfileAction(): RedirectResponse
    {
        $validated = request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . Auth::user()->id],
        ]);

        User::where('id', '=', Auth::user()->id)->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        return back()->with('status', 'Profile updated successfully.');
    }
}
