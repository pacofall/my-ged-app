<?php

namespace App\Http\Controllers;

use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function login(Request $request)
    {

        if ($request->method() == 'POST') {
            $credentials = [
                "email"=>$request->input("email"),
                "password"=> $request->input("password")
            ];

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended(route("homepage"));
            }

            return redirect()->route("auth-login-page")
                             ->withErrors(["error" => "credentials invalid"])->onlyInput("email");
        }
        return view("auth.login", []);
    }


    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request):RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route("homepage");
    }

}
