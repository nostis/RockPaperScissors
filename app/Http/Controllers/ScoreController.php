<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Round;
use DB;

class ScoreController extends Controller {
    public function get() {
        $rounds = DB::table('rounds')->get();
        
        $userScore = $this->getUserScoreFromRounds($rounds);
        $compScore = $this->getCompScoreFromRounds($rounds);

        return response()->json(['user_score' => $userScore, 'comp_score' => $compScore], 200);
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