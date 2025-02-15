<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function create()
    {
        // Show create form

        return view('users.register');
    }

    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', 'min:6'],
        ]);

        // hash the passford before save
        $fields['password'] = bcrypt($fields['password']);

        // create user
        $user = User::create($fields);

        // login after user created
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged in!');
    }

    public function logout(Request $request)
    {
        // Logout

        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'User logged out!');
    }

    public function login()
    {
        // Show create form

        return view('users.login');
    }

    public function authenticate(Request $request)
    {
        $fields = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // attempt to login
        if (auth()->attempt($fields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['email' => 'Invalid Credentials'])->onlyInput('email');
    }
}
