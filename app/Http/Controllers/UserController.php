<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;
use App\Station;
use App\User;
use App\Http\Requests;
use Validator;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	public function showProfile()
	{
        $name = Auth::user()->username;
        return view('users.userProfile', [
        	'name' => $name
        	]);
	}
	
	public function show()
	{
		# code...
	}

    public function getApiKey()
    {
    	//
    }
}
