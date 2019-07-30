<?php
Use App\GameHistory;

Route::get('history', function() {
    return GameHistory::all();
});