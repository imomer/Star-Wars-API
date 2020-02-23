<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planet extends Model {

	/**
	 * Relation to people
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function people() {

		return $this->hasMany( 'App\People',
			'homeworld',
			'id'
		);

	}

}
