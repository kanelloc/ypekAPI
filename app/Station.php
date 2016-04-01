<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Station extends Model
{
	protected $table = 'stations';

	protected $fillable = [
        'stationName', 
        'stationPass', 
        'lat',
        'lng'
    ];

    public function measures()
    {
    	return $this->hasMany('App\Measure');
    }
    
}
