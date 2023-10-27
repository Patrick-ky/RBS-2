<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class Authcontroller extends Controller
{
    function login(){

        return view('login');
    }


    function registration(){
        return view('registration');
    }


    function loginp(Request $request){
        $request->validate([
            'email'=> 'required',
            'password'=> 'required'
        ]);

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('homepage'))->with("logged in Successfully");
        };
        return redirect(route('welcomepage'))->with("error", "Login failed, please check your email and password");
    }

    function registrationp(Request $request) {
        $request->validate([
            'fname' => 'required',
            'mname' => 'nullable',
            'lname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'password_confirmation' => 'required',
        ]);
    
        if ($request->input('password') !== $request->input('password_confirmation')) {
            return view('registration.registration')->with("error", "Password and confirmation do not match.");
        }
    
        $data = [
            'fname' => $request->input('fname'),
            'mname' => $request->input('mname'),
            'lname' => $request->input('lname'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ];
    
        $user = User::create($data);
    
        if (!$user) {
            return redirect()->route('registration')->with("error", "Registration failed, please check your details.");
        }
    
        return redirect()->route('welcomepage')->with("success", "Registration successful. You may now log in.");
    }


    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('welcomepage'));
    }


    function welcome()
    {
        $users = User::all();

        return(compact('users'));
    }


}
