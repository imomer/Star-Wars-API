<?php

namespace App\Http\Controllers;

use App\Film;
use App\People;
use App\Planet;
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



	public function GetPlanetsWithPilots() {

		// Get planets with pilots along with their species
		$planets = Planet::with( [
			'people' => function ( $q ) {
				return $q->has( 'vehicles_pilots' )->with('species');
			}
		] )->withCount( [
			'people' => function ( $q ) {
				return $q->has( 'vehicles_pilots' );
			}
		] )->orderByDesc('people_count')->get()->reject( function ( $planet ) {
			return $planet->people_count === 0;
		} )->values();

		return $planets;

	}


}
