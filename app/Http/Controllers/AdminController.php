<?php

namespace App\Http\Controllers;

use Response;
use DB;
use Illuminate\Http\Request;
use App\Measure;
use App\Station;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function adminPanel()
    {
    	$count = 1;
    	$count2 = 1;
    	$count3 = 1;
    	$users = User::all();

    	$stationRequestAll = DB::table('user_details')->sum('counter_stations');
    	$spesificRequestAll = DB::table('user_details')->sum('counter_absolute');
    	$averageRequestAll = DB::table('user_details')->sum('counter_average');
    	$allRequests = $stationRequestAll + $spesificRequestAll + $averageRequestAll;

    	$userForDetails = User::with('user_details')->get();

    	$top10users = DB::table('users')
	    	->join('user_details', 'users.id', '=', 'user_details.user_id')
	    	->orderBy('user_details.counter_all', 'desc')
	    	->get();

    	return view('admin.adminpanel', [
    		'users'				=>	$users,
    		'userForDetails'	=>	$userForDetails,
    		'count'				=>	$count,
    		'count2'			=>	$count2,
    		'count3'			=>	$count3,
    		'stationRequestAll'	=>	$stationRequestAll,
    		'spesificRequestAll'=>	$spesificRequestAll,
    		'averageRequestAll'	=>	$averageRequestAll,
    		'allRequests'		=>	$allRequests,
    		'top10users'		=>	$top10users
    		]);
    }
}
