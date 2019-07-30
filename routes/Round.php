<?php
Use App\Round;

Route::post('round', function(Request $request) {
    return Round::create($request->all);
});