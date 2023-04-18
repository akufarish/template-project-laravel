<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("login", [
            "title" => "login",
        ]);
    }

    public function DoLogin(Request $request)
    {
        $user = $request->validate([
            "name" => "required",
            "password" => "required"
        ]);

        if(Auth::attempt($user)) {
            $request->session()->regenerate();
            
            return redirect("/dashboard");
        } 


        return back()->with("error");
    }

    public function DoLogout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/login");
    }

}
