<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Task extends Model
{

    protected $fillable = [

        'description',
        'date',
        'collaborators',
        'budget',
        'successMeasured',
        'progress',
        'action_id',
        'group',
        'userId',
        'ident'
    ];
    public function setDateAttribute($date)
    {
        $this->attributes['date'] = Carbon::createFromFormat('Y-m-d',$date);
    }

}
