<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignupRequest;
use App\Models\{User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash};

class AuthController extends Controller
{
    public function signUpPage()
    {
        return view('auth.registration');
    }

    function signUpValidate(SignupRequest $request)
    {
        $validated = $request->validated();

        $validated['password'] = Hash::make($request->password);

        User::create($validated);

        return redirect()->route('home')->with('success', 'Registered successfully');
    }

    public function loginPage()
    {
        return view('auth.login');
    }

    public function loginValidate(Request $request)
    {
        $request->validate([
            'email' => 'required|email|string',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect()->route('home')->with('success', 'Login successfully');
        }

        return back()->with('fail', 'Invalid credentials');
    }
}
