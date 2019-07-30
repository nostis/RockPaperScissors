<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GameHistory;

class GameHistoryController extends Controller
{
    public function all(){
        return response()->json(GameHistory::all(), 200);
    }
}
