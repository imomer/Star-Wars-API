<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class People extends Model
{

	/**
	 * Relation to films
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function films()
	{
		return $this->belongsToMany('App\Film',
			'films_characters',
			'people_id',
			'film_id'
		);
	}

}
