<?php

namespace App\Http\Controllers;

use App\Models\Murid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        } else {
            Session::flash("status", "gagal");
        }

        return back()->with("message", "akun tidak terdaftar");
    }

    public function success()
    {
        return view("welcome", [
            "title" => "dashboard"
        ]);
    }

    public function DoLogout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/login");
    }

}
