<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    protected $fillable = [
        'name',
        'goal_id',
        'group',
        'bp',
        'ident'
    ];

    public function getGoal($name) {
        $objectives = Objective::All();
        $objective = $objectives->where('name', $name)->first();
        $objective->toArray();
        return $objective->goal_id;
    }
 
}
