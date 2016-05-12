<?php

namespace App\Http\Controllers;

use Response;
use Auth;
use DB;
use Illuminate\Http\Request;
use App\Station;
use App\Measure;
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
    		//Counter for the stations
    		$active_user->with('user_details')->findOrFail($userId)->user_details->increment('counter_stations');
    		$stations = Station::all();
    		return Response::json([
    			'stations' => $this->transform($stations)
    			], 200);
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

    public function showSpesificValue($api_key, $stationPass, $type, $date, $hour)
    {
    	$active_user = Auth::user();
		$userId = Auth::user()->id;
		$active_api = $active_user->with('user_details')->findOrFail($userId)->user_details->api_key;
    	if ($api_key == $active_api) 
    	{
    		//Counter for the stations
    		$active_user->with('user_details')->findOrFail($userId)->user_details->increment('counter_absolute');
    		$stationShow = Station::where('stationPass', $stationPass)->first();
    		$details = $stationShow->measures()->where('type', $type)->where('date', $date)->first();
    		$result = array(
    			'name'			=> $stationShow->stationName,
    			'station lat'	=> $stationShow->lat,
    			'station lng'	=> $stationShow->lng,
                'fileName'      => $details->fileName,
                'type'          => $details->type,
                'date'          => $details->date,
                'time-'.$hour   => $details->$hour,
            );
    		return $result;
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
    //-----------------------------------------------------------------------------------------------------------
    
    public function showRangeValue($api_key, $stationPass, $type, $date1, $date2)
    {
        $active_user = Auth::user();
        $userId = Auth::user()->id;
        $active_api = $active_user->with('user_details')->findOrFail($userId)->user_details->api_key;
        if ($api_key == $active_api) 
        {
            $data = array();
            //Counter for the stations
            $active_user->with('user_details')->findOrFail($userId)->user_details->increment('counter_average');
            $stationShow = Station::where('stationPass', $stationPass)->first();
            $details = $stationShow->measures()->where('type', $type)->whereBetween('date',[$date1, $date2])->get();
            foreach ($details as $detail) {
                $data[] = array(
                    '00:00' => $detail->am0,
                    '01:00' => $detail->am1,
                    '02:00' => $detail->am2,
                    '03:00' => $detail->am3,
                    '04:00' => $detail->am4,
                    '05:00' => $detail->am5,
                    '06:00' => $detail->am6,
                    '07:00' => $detail->am7,
                    '08:00' => $detail->am8,
                    '09:00' => $detail->am9,
                    '10:00' => $detail->am10,
                    '11:00' => $detail->am11,
                    '12:00' => $detail->pm12,
                    '13:00' => $detail->pm13,
                    '14:00' => $detail->pm14,
                    '15:00' => $detail->pm15,
                    '16:00' => $detail->pm16,
                    '17:00' => $detail->pm17,
                    '18:00' => $detail->pm18,
                    '19:00' => $detail->pm19,
                    '20:00' => $detail->pm20,
                    '21:00' => $detail->pm21,
                    '22:00' => $detail->pm22,
                    '23:00' => $detail->pm23,
                    );
            }
            foreach ($data as $deta) {
                $average[] = array(
                    'average' => array_sum($deta)/24
                    );
            }
            foreach ($average as $k => $v) {
                $count = $k+1;
                $new[$k] = $v['average'];
            }
            $average_all = array_sum($new)/$count;
            $result = array(
                'station name'      => $stationShow->stationName,
                'station lat'       => $stationShow->lat,
                'station lng'       => $stationShow->lng,
                'average'           => $average_all
                );
            return $result;
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

    //Transformation for stations--------------------------------------------------------------------------------
    public function transform($stations)
    {
    	return array_map(function($station)
    	{
    		return [
    			'name' => $station['stationName'],
    			'pass' => $station['stationPass'],
    			'lattitude' => $station['lat'],
    			'longtitude' => $station['lng'],
    		];

    	}, $stations->toArray());
    }
}
