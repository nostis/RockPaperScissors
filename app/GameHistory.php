<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GameHistory extends Model
{
    protected $fillable = ['rounds' => 'array', 'winner', 'user_score', 'comp_score'];
}
