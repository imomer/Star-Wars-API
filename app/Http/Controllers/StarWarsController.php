<?php

namespace App\Http\Controllers;

use App\Film;
use Illuminate\Http\Request;

class StarWarsController extends Controller
{

	/**
	 * Get longest opening crawl films
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function GetLongestOpeningCrawlFilm() {

		// Get film with longest opening crawl length
		$films = Film::orderByRaw( 'LENGTH(opening_crawl) DESC' )->take( 1 )->get();

		return response()->json( $films, 200 );

	}

}
