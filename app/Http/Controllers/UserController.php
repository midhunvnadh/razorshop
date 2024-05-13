<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function signup(Request $req){
        $req->validate([
            "Email"=> "required|email",
            "PhoneNumber"=> "required|numeric|min:10",
            "Password"=> "required|string|min:8|regex:/[@$!%*#?&]/",
        ]);

        $user = new User();

        $user->email = $req->Email;
        $user->phone = $req->PhoneNumber;
        $user->password = bcrypt($req->Password);
        $user->su = 0;

        $user->save();

        return redirect("/");
    }

    public function login(Request $req){

        $if = $req->validate([
            "Email"=> "required|email",
            "Password"=> "required|string|min:8|regex:/[@$!%*#?&]/",
        ]);

        $user = [
            "email" => $req->Email,
            "password" => $req->Password
        ];

        var_dump($if);

        if(auth()->attempt([
            "email" => $if["Email"],
            "password" => $if["Password"]
        ])){
            $req->session()->regenerate();
            return redirect("/");
        } else {
            return back()->withErrors([
                "failed"=> "Account not found or wrong credentials.",
            ]);
        }

    }

    public function logout(Request $req){
        auth()->logout();

        return redirect("/");
    }
}
