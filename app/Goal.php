<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{

    protected $fillable = [
        'name',
        'id',
        'bpid',
        'teamOrDeptId',
        'bp',
        'ident'


    ];

    public function getBusinessPlan($name) {
        $goals = Goal::All();
        $goal = $goals->where("name", "=", $name)->first();
        return $goal->bpid;
    }
}
