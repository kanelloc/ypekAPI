<?php

namespace App\Http\Utilities;

/**
* 
*/
class DirtTypes
{
	
	protected static $dirtTypes=[
		"Μονοξείδιο του άνθρακα (CO)"		=>	"CO",
		"Οξείδιο του αζώτου (NO)"			=>	"NO",
		"Οξείδιο του αζώτου (NO2)"			=>	"NO2",
		"Όζον (O3)"							=>	"O3",
		"Διοξείδιο του θείου (SO2)"			=>	"SO2",
		"Αιωρούμενα σωματίδια (ΑΣ10)"		=>	"AS10",
		"Αιωρούμενα σωματίδια (ΑΣ2,5)"		=>	"AS25",
		"Βενζόλιο (Benz)"					=>	"BENZ"
	];

	public static function all()
	{
		return static::$dirtTypes;
	}
}