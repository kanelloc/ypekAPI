<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    public function getSignup()
    {
        return view('auth.signup');
    }

    public function postSignup(Request $request)
    {
    	//Validate the values from the inputs
        $this->validate($request,[
        	'email' => 'required|unique:users|email|max:255',
        	'username' => 'required|unique:users|alpha_dash|min:3|max:20',
			'password' => 'required|min:6',
        	]);
        //Create the user account to the db using User model
        User::create([
        	'email' => $request->input('email'),
        	'username' => $request->input('username'),
        	'password' => bcrypt($request->input('password')),
        	]);

        return redirect()->route('index')->with('info', 'Your acount has been created!');

    }
    //--Sign in section

    public function getSignin()
    {
    	return view('auth.signin');
    }

    public function postSignin(Request $request)
    {
        //-Validation for the user infos
        $this->validate($request,[
            'email'=> 'required',
            'password' => 'required',
            ]);
        //-Check for wrong user details
        if (!Auth::attempt($request->only(['email', 'password']), $request->has('remember'))) {
            return redirect()->back()->with('alert', 'Wrong User information');
        }
        
        //Alert if the user is Admin
        if (Auth::user()->admin) {
            return redirect()->route('index')->with('success', 'You are now Signed in as Admin.');
        }

        return redirect()->route('index')->with('success', 'You are now Signed in.');
    }
    //--Sign out section
    public function getSignout()
    {
        Auth::logout();
        return redirect()->route('index')->with('info', 'You are singed out.See you later.');
    }

}
