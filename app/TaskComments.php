<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TaskComments extends Model
{
    protected $fillable = [
        'description',
        'date',
        'user_ID',
        'task_ID'
        ];

    public function setDateAttribute($date)
    {
        $this->attributes['date'] = Carbon::createFromFormat('Y-m-d',$date);
    }
}
