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
		'00',
		'01',
		'02',
		'03',
		'04',
		'05',
		'06',
		'07',
		'08',
		'09',
		'10',
		'11',
		'12',
		'13',
		'14',
		'15',
		'16',
		'17',
		'18',
		'19',
		'20',
		'21',
		'22',
		'23',
		'24'
	];



    public function station()
    {
    	return $this->belongsTo('App\Station');
    }
}
