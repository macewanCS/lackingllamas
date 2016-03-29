<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActionComments extends Model
{
    protected $fillable = [
        'description',
        'date',
        'user_ID',
        'action_ID'
    ];

    public function getComments($action_id)
    {
        $comments = ActionComments::All();
        $comment = $comments->where('action_ID', $action_id);
        return $comment;
    }
}
