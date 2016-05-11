<?php

namespace App\Http\Controllers;

use Response;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Station;
use App\User;
use App\User_Details;
use App\Http\Requests;
use Validator;
use App\Http\Controllers\Controller;

class ApiController extends Controller
{
    public function showApiStations($api_key)
    {
    	$active_user = Auth::user();
		$userId = Auth::user()->id;
		$active_api = $active_user->with('user_details')->findOrFail($userId)->user_details->api_key;
    	if ($api_key == $active_api) 
    	{
    		$stations = Station::all();
    		return $stations;
    	}
    	else
    	{
    		return Response::json([
    			'error' => [
    				'message' => 'Wrong api key authentication',
    				'code' => '215'
    			]
    		]);
    	}
    }
}
