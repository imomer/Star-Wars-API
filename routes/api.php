<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Longest opening crawl films
Route::get('longest-opening-crawl-film', 'StarWarsController@GetLongestOpeningCrawlFilm');

// Most appeared characters
Route::get('most-appeared-character', 'StarWarsController@GetMostAppearedCharacter');

// Get planets with pilots
Route::get('planets-with-pilots', 'StarWarsController@GetPlanetsWithPilots');

// Most appeared species
Route::get('most-appeared-species', 'StarWarsController@GetMostAppearedSpecies');