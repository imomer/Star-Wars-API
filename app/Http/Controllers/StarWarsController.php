<?php

namespace App\Http\Controllers;

use App\Film;
use App\People;
use App\Planet;
use Illuminate\Http\Request;

class StarWarsController extends Controller {

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


	/**
	 * Get planets with largest number of pilots
	 *
	 * @return \Illuminate\Database\Eloquent\Builder[]|\Illuminate\Database\Eloquent\Collection
	 */
	public function GetPlanetsWithPilots() {

		// Get planets with largest number of pilots along with their species
		$planets = Planet::with( [
			'people' => function ( $q ) {
				return $q->has( 'vehicles_pilots' )->with( 'species' );
			}
		] )->withCount( [
			'people' => function ( $q ) {
				return $q->has( 'vehicles_pilots' );
			}
		] )->orderByDesc( 'people_count' )->get()->reject( function ( $planet ) {
			return $planet->people_count === 0;
		} )->values();

		return response()->json( $planets, 200 );

	}


	/**
	 * Get most appeared species
	 *
	 * @return array
	 */
	public function GetMostAppearedSpecies() {

		// Get all films
		$films = Film::with( [

			// Get characters of each film
			'characters' => function ( $q ) {

				// Get species of each character
				return $q->with( 'species' );

			}
		] )->get()->map( function ( $film ) {

			$characters_species = [];

			// This loop is just for counting up the species appearances
			foreach ( $film->characters as $character ) {

				$get_species = '';

				foreach ( $character->species as $species ) {
					$get_species .= $species->name;
				}

				if ( ! empty( $get_species ) ) {

					$characters_species[] = $get_species;

				}

			}

			return $characters_species;

		} );


		$films_species = [];

		/* Gather species of every character appeared in any movie
		 * and put them in one big giant array
		 */
		foreach ( $films as $film ) {
			foreach ( $film as $spcies ) {
				$films_species[] = $spcies;
			}
		}

		// Sum up same species in the array
		$species_counts = array_count_values( $films_species );

		// Sort species in descending order
		arsort( $species_counts );

		return $species_counts;

	}


}
