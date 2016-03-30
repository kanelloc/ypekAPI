<?php

namespace App\Http\Utilities;

/**
* 
*/
class DirtTypes
{
	
	protected static $dirtTypes=[
		"Μονοξείδιο του άνθρακα (CO)",
		"Οξείδιο του αζώτου (NO)",
		"Οξείδιο του αζώτου (NO2)",
		"Όζον (O3)",
		"Διοξείδιο του θείου (SO2)",
		"Αιωρούμενα σωματίδια (ΑΣ10)",
		"Αιωρούμενα σωματίδια (ΑΣ2,5)",
		"Βενζόλιο (Benz)"
	];

	public static function all()
	{
		return static::$dirtTypes;
	}
}