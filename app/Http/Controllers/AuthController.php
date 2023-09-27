<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request){
        $validated = $request->validated();

        if (Auth::attempt($validated)) {
            return redirect()->route('home');
        }

        return back()->withErrors(['email' => 'Invalid login credentials'])->withInput();
    }

    public function register(RegisterRequest $request){
        $validated = $request->validated();

        $user = User::create($validated);
        Auth::login($user);
        
        return redirect()->route('home');
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('login');
    }
}
