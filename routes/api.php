<?php

use Illuminate\Http\Request;
Use App\Round;
Use App\GameHistory;

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

Route::get('history', function() {
    return GameHistory::all();
});

Route::post('round', function(Request $request) {
    return Round::create($request->all);
});
