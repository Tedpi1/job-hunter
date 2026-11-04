<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Display the login page.
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Authenticate the user.
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        if (! Auth::attempt($credentials, $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => 'The email address or password is incorrect.',
            ]);
        }

        $request->session()->regenerate();

        $user = Auth::user();

        // Redirect administrators to the Filament admin panel.
        if ((int) $user->role === 1) {
            return redirect()->intended('/admin');
        }

        // Redirect job seekers to their dashboard.
        return redirect()->intended('/dashboard');
    }

    /**
     * Log the user out.
     */
    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'You have been logged out successfully.');
    }
}
