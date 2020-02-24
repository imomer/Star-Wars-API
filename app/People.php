<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model {

	/**
	 * Relation to films
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function films() {
		return $this->belongsToMany( 'App\Film',
			'films_characters',
			'people_id',
			'film_id'
		);
	}


	/**
	 * Relation to characters
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function species() {
		return $this->belongsToMany( 'App\Species',
			'species_people',
			'people_id',
			'species_id'
		);
	}

	/**
	 * Relation to pilots
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function vehicles_pilots() {

		return $this->hasMany( 'App\VehiclesPilot',
			'people_id',
			'id'
		);

	}

}
