<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class StationsController extends Controller
{
	public function index()
	{
		//
	}


    public function create()
    {
    	return view('admin.stations.create');
    }

    public function store(Request $request)
    {
    	dd('ola ok');
    }
}
