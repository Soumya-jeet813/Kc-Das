<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('register'); // This looks for resources/views/auth/register.blade.php
    }
    // Show the Login Page
    public function showLogin()
    {
        return view('login'); 
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'last_name' => 'required|string|max:255', // Validate the last name
            'email'     => 'required|string|email|max:255|unique:users',
            'phone'     => 'required|string',
            'password'  => 'required|string|min:8|confirmed', // Looks for password_confirmation
        ]);

        $user = User::create([
            // Combine First and Last name into the single 'name' column in DB
            'name'     => $request->name . ' ' . $request->last_name, 
            'email'    => $request->email,
            'phone'    => $request->phone,
            'password' => Hash::make($request->password),
            'role'     => 'customer',
        ]);

        Auth::login($user);

        return redirect()->route('account')->with('success', 'Welcome!');
    }
    // Handle Login Request
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('account');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Handle Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
