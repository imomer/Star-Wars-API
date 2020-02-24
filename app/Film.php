<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model {

	/**
	 * Relation to characters
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function characters() {
		return $this->belongsToMany( 'App\People',
			'films_characters',
			'film_id',
			'people_id' );
	}


	/**
	 * Relation to species
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function species() {
		return $this->belongsToMany( 'App\Species',
			'films_species',
			'film_id',
			'species_id'
		);
	}

}
