<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Round;

class RoundController extends Controller
{
    public function store(Request $request){
        Round::create($request->all());
        
        $response = "";
        //if(){}

        //making computer 'move' r, p or s
        //and returning response e.g Computer choosed rock, you won! with ifs etc

        return response()->json($response, 201)
    }
}
