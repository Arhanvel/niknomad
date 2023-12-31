<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $user = User::create(request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|min:3|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|max:255|min:7'
        ]));

        Auth::login($user);

        return redirect('/')->with('success', 'Your account has been created');
    }
}
