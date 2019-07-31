<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Round;
use DB;

class RoundController extends Controller
{
    public function store(Request $request){

        if($this->getSessionIdFromRequest($request) > $this->getLastSessionIdFromDb()){
            //construct gameHistory;
        }

        return $this->saveRound($request);
    }

    private function saveRound(Request $request){
        $round = new Round();
        $round->session_id = $request['session_id'];

        $userMove = $request['user_choosed'];
        $round->user_choosed = $userMove;

        $computerMove = "";
        $randomNumber = rand(1, 3);

        if($randomNumber == 1){
            $computerMove .= "rock";
        }
        elseif($randomNumber == 2){
            $computerMove .= "paper";
        }
        elseif($randomNumber == 3){
            $computerMove .= "scissors";
        }
        
        $round->comp_choosed = $computerMove;

        $score = "";

        if($userMove == "rock"){
            if($computerMove == "scissors"){
                $score .= "won";
            }
            elseif($computerMove == "paper"){
                $score .= "lost";
            }
            else{
                $score .= "draw";
            }
        }
        elseif($userMove == "paper"){
            if($computerMove == "scissors"){
                $score .= "lost";
            }
            elseif($computerMove == "rock"){
                $score .= "won";
            }
            else{
                $score .= "draw";
            }
        }
        elseif($userMove == "scissors"){
            if($computerMove == "rock"){
                $score .= "lost";
            }
            elseif($computerMove == "paper"){
                $score .= "won";
            }
            else{
                $score .= "draw";
            }
        }

        $isWin = null;

        if($score == "won"){
            $score = "you won!";
            $isWin = 1;
        }
        elseif($score == "lost"){
            $score = "you lost!";
            $isWin = -1;
        }
        else{
            $score = "draw!";
            $isWin = true;
            $isWin = 0;
        }

        $round->user_won = $isWin;

        $round->save();

        $response = "You choosed ". $userMove . " computer choosed " . $computerMove . " result: " . $score;

        return response()->json($response, 201);
    }

    private function getLastSessionIdFromDb(){
        $round = DB::table('rounds')->latest('updated_at')->first();
        return $round->session_id;
    }

    private function getSessionIdFromRequest(Request $request){
        return $request['session_id'];
    }
}
