<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $fillable = [

        'description',
        'date',
        'leads',
        'collaborators',
        'budget',
        'projectPlan',
        'successMeasured',
        'priority',
        'action_id',
        'ident'
    ];


}
