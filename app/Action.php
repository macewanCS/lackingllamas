<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Objective;
use App\Goal;
use App\BusinessPlan;
use Illuminate\Support\Facades\DB;

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
        'group',
        'userId',
        'ident'
    ];

    public function setDateAttribute($date)
    {
        $this->attributes['date'] = Carbon::createFromFormat('Y-m-d',$date);
    }

    // Pass the function the ActionID, get the Business Plan ID
    public function getBpIdFromAction($actionID) {

        $bp = DB::select("select b.* from actions a, business_plans b, objectives o, goals g where a.objective_id = o.id and o.goal_id = g.id and g.bpid = b.id and a.id = $actionID");
        return $bp[0]->id;
    }

    public function getAllObjectivesInBp($bpid) {
        $objectives = DB::select("select o.* from objectives o, goals g, business_plans b where  o.goal_id = g.id and g.bpid = b.id and b.id = $bpid");
        return collect($objectives);
    }
}
