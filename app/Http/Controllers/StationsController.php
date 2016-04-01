<?php

namespace App\Http\Controllers;

use Response;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Measure;
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
            'stationName' => mb_strtoupper($request->input('stationName')),
            'stationPass' => str_replace(' ', '',strtoupper($request->input('stationPass'))),
            'lng' => $request->input('lng'),
            'lat' => $request->input('lat')
            ]);

        return redirect()->back()->with('success','Station Created');

    }
    //Show each station informations------------------------
    public function show($stationPass)
    {   
        $stationShow = Station::where('stationPass', $stationPass)->first();
        if (count($stationShow) !==1) {
            return redirect()->back()->with('alert',"Don't be a cheater!");
        }
        else{
            // return view('admin.stations.showStation', [
            // 'stationShow' => $stationShow]);
            // return $stationShow->measures;
            return $stationShow->measures;
        }
    }
    
    //Edit each station information,csv parse GET request----------------------
    public function edit($stationPass)
    {
        $stationEdit = Station::where('stationPass', $stationPass)->first();
        return view('admin.stations.editStation', [
            'stationEdit' => $stationEdit]);
    }

    //Delete a row from the table---------------------------
    public function destroy($stationPass)
    {
        $deletedStation = Station::where('stationPass',$stationPass);
        $deletedStation->delete();
        return redirect()->back()->with('success', 'Station deleted succesfully');
    }
    //Upload station Measurements POST request-----------------------------------
    public function editUpload($stationPass, Request $request)
    {
        //Validate the values from the inputs
        $this->validate($request,[
            'measureYear' => 'required',
            'measureType' => 'required',
            'csvFile' => 'required'
            ]);

        $year = $request->input('measureYear');
        $type = $request->input('measureType');

        //Csv Upload-------------------------------------------------
        $uploadedFile = Input::file('csvFile');
        $file = fopen($uploadedFile, "r");
        while (($fileop = fgetcsv($file, 1000, ",")) !== FALSE) {
            $fileop[0] = date("y-m-d", strtotime($fileop[0]));
            $station = Station::where('stationPass', $stationPass)->first();
            $station->measures()->create([
                'year' => $year,
                'type' => $type,
                'date' => "$fileop[0]",
                '00'=>$fileop[1],
                '01'=>$fileop[2],
                '02'=>$fileop[3],
                '03'=>$fileop[4],
                '04'=>$fileop[5],
                '05'=>$fileop[6],
                '06'=>$fileop[7],
                '07'=>$fileop[8],
                '08'=>$fileop[9],
                '09'=>$fileop[10],
                '10'=>$fileop[11],
                '11'=>$fileop[12],
                '12'=>$fileop[13],
                '13'=>$fileop[14],
                '14'=>$fileop[15],
                '15'=>$fileop[16],
                '16'=>$fileop[17],
                '17'=>$fileop[18],
                '18'=>$fileop[19],
                '19'=>$fileop[20],
                '20'=>$fileop[21],
                '21'=>$fileop[22],
                '22'=>$fileop[23],
                '23'=>$fileop[24],
            ]);
        }
        return redirect()->back()->with('success','Station Measurements Uploaded');
    }
}
