<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthManager extends Controller
{
    function login(){
        if(Auth::check()){
            return redirect(route('welcome'));
        }
        return view('login');
    }

    function registration(){
        if(Auth::check()){
            return redirect(route('welcome'));
        }
        return view('register');
    }

    function loginPost(Request $request){
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = $request->only('username', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('welcome'))->with("success");
        }
        return redirect(route('login'))->with("error", "Login details are not valid");
    }

    function registrationPost(Request $request){
        $request->validate([
            'username' => ['required', Rule::unique('users')],
            'email' => 'required',
            'password' => 'required',
            'permission' => 'required'
        ]);
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $data['permission'] = $request->permission;
        $user = User::create($data);
        if(!$user){
            return redirect(route('registration'))->with("error", "Registration details are not valid");
        }
        return redirect(route('login'))->with("success", "Registration successful!"); 
    }

    function logout(){
        Session:flush();
        Auth::logout();
        return redirect(route('login')); 
    }
}
