<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    protected $fillable = ['user_choosed', 'comp_choosed', 'user_won', 'session_id'];
}
