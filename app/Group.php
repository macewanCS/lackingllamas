<?php

namespace App;

use App\Roster;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description',
        'budget',
        'user_ID',
        'team'
    ];
}
