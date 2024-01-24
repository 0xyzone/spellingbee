<?php

namespace App\Http\Controllers;

use App\Models\School;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\PastSchoolRecord;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        Redirect::setIntendedUrl(url()->previous());
        return view('profile.edit', [
            'user' => $request->user(),
            'schools' => School::all(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        if ($request->user()->isDirty('school')) {
            $pastSchool = $request->user()->school;
            $userId = $request->user()->id;

            PastSchoolRecord::create([
                'user_id' => $userId,
                'school_name' => $pastSchool,
            ]);
        }

        $request->user()->save();

        return redirect()->intended(RouteServiceProvider::PROFILE)->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
