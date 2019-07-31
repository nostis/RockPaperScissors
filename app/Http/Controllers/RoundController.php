<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Round;
use App\GameHistory;
use DB;

class RoundController extends Controller
{
    public function store(Request $request){
        $areRoundsExist = DB::table('rounds')->get()->count();

        if($areRoundsExist){
            $lastDbId = $this->getLastSessionIdFromDb();
            $idFromRequest = $this->getSessionIdFromRequest($request);
    
            if($idFromRequest > $lastDbId){
                $rounds = $this->getAllRoundsHavingSameSessionId($lastDbId);
    
                $userScore = $this->getUserScoreFromRounds($rounds);
                $compScore = $this->getCompScoreFromRounds($rounds);
    
                $winner = "";
                        
                if($userScore > $compScore){
                    $winner .= "User";
                }
                elseif($userScore < $compScore){
                    $winner .= "Computer";
                }
                else{
                    $winner .= "Draw";
                }
    
                $gameHistory = new GameHistory();
                $gameHistory->rounds = $rounds;
                $gameHistory->user_score = $userScore;
                $gameHistory->comp_score = $compScore;
                $gameHistory->winner = $winner;
    
                $gameHistory->save();
                DB::table('rounds')->delete();
            }
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

    private function getAllRoundsHavingSameSessionId($id){
        return DB::table('rounds')->where('session_id', $id)->get();
    }

    private function getUserScoreFromRounds($rounds){
        $score = 0;

        foreach($rounds as $r){
            if($r->user_won == 1){
                $score++;
            }
        }

        return $score;
    }

    private function getCompScoreFromRounds($rounds){
        $score = 0;

        foreach($rounds as $r){
            if($r->user_won == -1){
                $score++;
            }
        }

        return $score;
    }
}
