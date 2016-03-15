<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

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

    public function setDateAttribute($date)
    {
        $this->attributes['date'] = Carbon::createFromFormat('Y-m-d',$date);
    }
}
