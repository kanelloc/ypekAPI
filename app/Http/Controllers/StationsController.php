<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Station;
use App\Http\Requests;
use Validator;
use App\Http\Controllers\Controller;

class StationsController extends Controller
{
    //stations GET request----------------------
	public function index()
	{
        $count = 1;
        $stations = DB::table('stations')->get();
		return view('admin.stations.indexStation', [
            'stations' => $stations,
            'count' => $count]);
	}

    //stations/create GET request----------------------
    public function create()
    {
    	return view('admin.stations.create');
    }

    //stations POST request----------------------------
    public function store(Request $request)
    {
        //Validate the values from the inputs
        $this->validate($request,[
            'stationName' => 'required',
            'stationPass' => 'required|unique:stations',
            'lat' =>'required',
            'lng' => 'required',
            ]);
        
        Station::create([
            'stationName' => $request->input('stationName'),
            'stationPass' => strtoupper($request->input('stationPass')),
            'lng' => $request->input('lng'),
            'lat' => $request->input('lat')
            ]);

        return redirect()->back()->with('success','Station Created');

    }
    //Show each station informations------------------------
    public function show($stationPass)
    {   
        $stationShow = Station::where('stationPass', $stationPass)->first();
        return view('admin.stations.showStation', [
            'stationShow' => $stationShow]);
    }
    
    //Delete a row from the table---------------------------
    public function destroy($stationPass)
    {
        $deletedStation = Station::where('stationPass',$stationPass);
        $deletedStation->delete();
        return redirect()->back()->with('success', 'Station deleted succesfully');
    }
}
