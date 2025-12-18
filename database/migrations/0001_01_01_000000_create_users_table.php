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
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class], // ✅ Fixed: max:255
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:user,admin'],
        ]);

        // Check if admin role is selected with correct email
        if ($request->role === 'admin' && $request->email !== 'madihaayub192@gmail.com') {
            return back()->withErrors([
                'email' => 'Administrator accounts must use the email: madihaayub192@gmail.com'
            ])->withInput();
        }

        // ✅ FIXED: Try-catch block for role column
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role,
            ]);
        } catch (\Exception $e) {
            // Agar role column nahi hai to without role create karo
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            
            // Manually role store karo session mein
            session(['user_role' => $request->role]);
        }

        event(new Registered($user));

        Auth::login($user);

        // ✅ FIXED: Redirect based on role AND checkout redirect
        $userRole = $user->role ?? session('user_role', 'user');
        
        if ($userRole === 'admin') {
            return redirect()->route('admin.dashboard'); // Admin ko admin dashboard pe
        } else {
            // Check if user came from checkout
            if ($request->redirect_to_checkout == '1') {
                return redirect()->route('checkout'); // Redirect to checkout page
            } else {
                return redirect()->route('welcome'); // ✅ Regular users ko welcome page pe
            }
        }
    }
}