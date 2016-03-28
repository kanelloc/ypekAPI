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
	public function index()
	{
        $count = 1;
        $stations = DB::table('stations')->get();
		return view('admin.stations.indexStation', [
            'stations' => $stations,
            'count' => $count]);
	}


    public function create()
    {
    	return view('admin.stations.create');
    }

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

    public function show()
    {
        dd('Show element');
    }
    
    //Delete a row from the table
    public function destroy($stationPass)
    {
        $deletedStation = Station::where('stationPass',$stationPass);
        $deletedStation->delete();
        return redirect()->back()->with('success', 'Station deleted succesfully');
    }
}
