<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
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
        'objective_id',
        'ident'
    ];

}
