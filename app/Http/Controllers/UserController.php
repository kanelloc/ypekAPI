<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Station;
use App\Http\Requests;
use Validator;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function userPanel()
    {
    	$stationsApi = DB::table('stations')->get();
    	return $stationsApi;
    }
}
