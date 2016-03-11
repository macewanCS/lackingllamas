<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TeamsAndDepartments extends Model
{
    protected $fillable = [
        'name',
        'description',
        'budget',
        'team'
    ];
}
