<?php

namespace App\Http\Controllers;

use App\Film;
use App\People;
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


	/**
	 * Get character with highest appearances in films
	 *
	 * @return \Illuminate\Http\JsonResponse
	 */
	public function GetMostAppearedCharacter() {

		// Get characters with films count
		$characters = People::withCount( [ 'films' ] )
		                    ->orderBy( 'films_count', 'DESC' )
		                    ->take( 1 )
		                    ->get();

		return response()->json( $characters, 200 );

	}


}
