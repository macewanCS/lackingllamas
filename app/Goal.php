<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{

    protected $fillable = [
        'name',
        'id',
        'bpid',
        'group',
        'bp',
        'ident'


    ];

    public function getBusinessPlan($name) {
        $goals = Goal::All();
        $goal = $goals->where("name", "=", $name)->first();
        return $goal->bpid;
    }
          public function objectives()
    {
         return $this->hasMany('App\Objective', 'goal_id');
    }
}
