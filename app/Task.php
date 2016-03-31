<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
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

    public function getAllActionsInBp($bpid)
    {
        $actions = DB::select("select a.* from actions a, objectives o, goals g, business_plans b where a.objective_id = o.id and o.goal_id = g.id and g.bpid = b.id and b.id = $bpid");
        return collect($actions);
    }

    public function getBpIdFromTask($taskID) {

        $bp = DB::select("select b.* from tasks t, actions a, business_plans b, objectives o, goals g where t.action_id = a.id and a.objective_id = o.id and o.goal_id = g.id and g.bpid = b.id and t.id = $taskID");
        return $bp[0]->id;
    }

}
