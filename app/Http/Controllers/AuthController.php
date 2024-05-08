<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login.index');
    }

    public function login(AuthRequest $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials, $request->remember_me)) {
            return redirect()->route('admin.posts');
        }

        return back()->withErrors('Invalid credentials.');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('admin.login');
    }
}
