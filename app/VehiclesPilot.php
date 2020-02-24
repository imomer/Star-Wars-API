<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VehiclesPilot extends Model {
	/**
	 * Relation to pilots
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasOne
	 */
	public function pilot() {
		return $this->hasOne( 'App\People', 'id', 'people_id' );
	}
}
