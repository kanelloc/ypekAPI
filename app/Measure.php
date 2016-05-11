<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Measure extends Model
{
	protected $table = 'station_measures';

	protected $fillable = [
		'fileName',
		'year',
		'type',
		'date',
		'am0',
		'am1',
		'am2',
		'am3',
		'am4',
		'am5',
		'am6',
		'am7',
		'am8',
		'am9',
		'am10',
		'am11',
		'pm12',
		'pm13',
		'pm14',
		'pm15',
		'pm16',
		'pm17',
		'pm18',
		'pm19',
		'pm20',
		'pm21',
		'pm22',
		'pm23',
	];



    public function station()
    {
    	return $this->belongsTo('App\Station');
    }
}
