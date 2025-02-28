<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],  // Make sure it's unique in the 'users' table
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
        'role_id' => ['required', 'exists:roles,id'],  // Ensure the role_id exists in the roles table
    ]);

    

    // Create the user with the provided data
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role_id' => $request->role_id,  // Store the role_id in the user record
    ]);

    // Fire the Registered event
    event(new Registered($user));

    // Log the user in after registration
    Auth::login($user);

    if ($user->role_id == 1) { // Job Seeker
        return redirect()->route('jobseeker.dashboard');
    } 
    
    elseif ($user->role_id == 2) { // Recruiter
        return redirect()->route('recruiter.dashboard');
    }

}

}
