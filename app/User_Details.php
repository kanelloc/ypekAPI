<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Details extends Model
{
    protected $table = 'user_details';

    protected $fillable = [
    	'api_key',
    	'counter_stations',
    	'counter_absolute',
    	'counter_average',
    	'counter_all'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
