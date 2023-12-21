<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Todo extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function abroading_plan()
    {
        return $this->belongsTo(AbroadingPlan::class);
    }

    public function isSoonDuedate()
    {
        $now = Carbon::now();
        $duedate = Carbon::parse($this->duedate);
        
        return $duedate->subWeek()->lt($now);
    }
}
