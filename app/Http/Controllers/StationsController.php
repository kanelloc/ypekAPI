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
        $count = 1;
        $stationShow = Station::where('stationPass', $stationPass)->first();
        
        if (count($stationShow) !==1) {
            return redirect()->back()->with('alert',"Don't be a cheater!");
        }
        else{
            $stationShowId = $stationShow->id;
            $measuresShow = Measure::where('station_id', $stationShowId)->groupBy('fileName')->get();
            return view('admin.stations.showStation', [
            'stationShow' => $stationShow,
            'measuresShow' => $measuresShow,
            'count' => $count]);
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
    //Show and Delete each station's profile information-------------------------
    //Upload station Measurements POST request-----------------------------------
    public function editUpload($stationPass, Request $request)
    {
        //Validate the values from the inputs------------------------------------
        $this->validate($request,[
            'measureYear' => 'required',
            'measureType' => 'required',
            'csvFile' => 'required'
            ]);

        $year = $request->input('measureYear');
        $type = $request->input('measureType');

        //Csv Upload-------------------------------------------------------------
        $uploadedFile = Input::file('csvFile');
        $uploadedFileName = Input::file('csvFile')->getClientOriginalName();
        $uploadedFileName = str_replace('#', '-', $uploadedFileName);
        $file = fopen($uploadedFile, "r");
        //Validation Variables for type,year file mismatch-----------------------
        $val1 = strpos($uploadedFileName, $type);
        $val2 = strpos($uploadedFileName, $year);
        if ($val1 === false || $val2 === false) {
            return redirect()->back()->with('alert','File mismatch with year and type!');
        }else{
            while (($fileop = fgetcsv($file, 1000, ",")) !== FALSE) {
                for ($x=0; $x < sizeof($fileop); $x++) { 
                    if ($fileop[$x] == -9999) {
                        $fileop[$x] = 0;
                    }
                }
                $fileop[0] = date("y-m-d", strtotime($fileop[0]));
                $station = Station::where('stationPass', $stationPass)->first();
                $station->measures()->create([
                    'fileName' => $uploadedFileName,
                    'year' => $year,
                    'type' => $type,
                    'date' => "$fileop[0]",
                    'am0'=>$fileop[1],
                    'am1'=>$fileop[2],
                    'am2'=>$fileop[3],
                    'am3'=>$fileop[4],
                    'am4'=>$fileop[5],
                    'am5'=>$fileop[6],
                    'am6'=>$fileop[7],
                    'am7'=>$fileop[8],
                    'am8'=>$fileop[9],
                    'am9'=>$fileop[10],
                    'am10'=>$fileop[11],
                    'am11'=>$fileop[12],
                    'pm12'=>$fileop[13],
                    'pm13'=>$fileop[14],
                    'pm14'=>$fileop[15],
                    'pm15'=>$fileop[16],
                    'pm16'=>$fileop[17],
                    'pm17'=>$fileop[18],
                    'pm18'=>$fileop[19],
                    'pm19'=>$fileop[20],
                    'pm20'=>$fileop[21],
                    'pm21'=>$fileop[22],
                    'pm22'=>$fileop[23],
                    'pm23'=>$fileop[24],
                ]);
            }
            return redirect()->back()->with('success','Station Measurements Uploaded');           
        }
    }
    //Delete each .dat file from the db----------------------------------------
    public function destroyCsv($stationPass, $fileName)
    {
        $stationLink = Station::where('stationPass', $stationPass)->first();
        $stationLinkId = $stationLink->id;
        $deletedCsv = Measure::where('station_id', $stationLinkId)->where('fileName', $fileName)->delete();
        return redirect()->back()->with('sucess','Csv File deleted succesfully');
    }
}
