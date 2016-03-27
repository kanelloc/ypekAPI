<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class StationsController extends Controller
{
    public function create()
    {
    	return view('admin.stations.create');
    }
}
