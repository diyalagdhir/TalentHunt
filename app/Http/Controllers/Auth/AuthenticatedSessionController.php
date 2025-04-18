<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
{
    // Validate login request
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string|min:8',
    ]);

    // Attempt login using Auth::attempt()
    if (!Auth::attempt($request->only('email', 'password'))) {
        return redirect()->route('login')->with('error', 'Invalid email or password. Please try again.');
    }

    $request->session()->regenerate();

    // Get authenticated user
    $user = Auth::user();

    // Redirect based on role_id
    if ($user->role_id == 1) {
        return redirect()->to('/adminDashboard')->with('status', 'Logged in successfully.');
    } elseif ($user->role_id == 2) {
        return redirect()->to('/')->with('status', 'Logged in successfully.');
    } elseif ($user->role_id == 3) {
        return redirect()->to('/dashboard')->with('status', 'Logged in successfully.');
    }

    return redirect()->route('login')->with('error', 'Role not recognized.');
}

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
