<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;
use App\Station;
use App\User;
use App\User_Details;
use App\Http\Requests;
use Validator;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
	public function showProfile()
	{
		$active_user = Auth::user();
		$userId = Auth::user()->id;
		if (($active_user->user_details()->select('api_key')->get()->isEmpty())) {
			$active_api = 'Empty';
			$spesificRequest = 'Empty';
			$stationRequest = 'Empty';
			$averageRequest = 'Empty';
			$allRequest = 'Empty';
		}
		else
		{
			$active_api = $active_user->with('user_details')->findOrFail($userId)->user_details->api_key;
			$stationRequest = $active_user->with('user_details')->findOrFail($userId)->user_details->counter_stations;
			$spesificRequest = $active_user->with('user_details')->findOrFail($userId)->user_details->counter_absolute;
			$averageRequest = $active_user->with('user_details')->findOrFail($userId)->user_details->counter_average;
			$allRequest = $active_user->with('user_details')->findOrFail($userId)->user_details->counter_all;
		}
        $name = Auth::user()->username;
        $email = Auth::user()->email;
        return view('users.userProfile', [
        	'name' 				=>	$name,
        	'email'				=>	$email,
        	'active_api'		=>	$active_api,
        	'stationRequest'	=>	$stationRequest,
        	'spesificRequest'	=>	$spesificRequest,
        	'averageRequest'	=>	$averageRequest,
        	'allRequest'		=>	$allRequest,
        	]);
	}
	
	public function show()
	{
		# code...
	}

    public function getApiKey()
    {
    	$user = Auth::user();
    	$userId = Auth::user()->id;
		$mail = Auth::user()->email;
		$api_key = md5($mail);
		if (($user->user_details()->select('api_key')->get()->isEmpty())) {
			$user->user_details()->create([
			'api_key' => $api_key,
			]);
			return redirect()->back()->with('success','Api key is gg!!!');
		}
		else
		{
			return redirect()->back()->with('alert','You already have api_key');
		}
    }
}
