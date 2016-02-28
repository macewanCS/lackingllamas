<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessPlan extends Model
{

    protected $fillable = [
        'name',
        'created',
        'ending'
    ];

}
