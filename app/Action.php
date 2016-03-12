<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Action extends Model
{

    protected $fillable = [

        'description',
        'date',
        'collaborators',
        'budget',
        'successMeasured',
        'progress',
        'objective_id',
        'teamOrDeptId',
        'userId',
        'ident'
    ];

}
