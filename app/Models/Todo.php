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

    public function abroadingPlan()
    {
        return $this->belongsTo(AbroadingPlan::class);
    }

    public function isSoonDuedate()
    {
        $now = Carbon::now();
        $duedate = Carbon::parse($this->duedate);

        return $duedate->subWeek()->lt($now);
    }

    public function isDuedate()
    {
        // $now = Carbon::now();
        $duedate = Carbon::parse($this->duedate);

        return $duedate->isToday();
    }

    public function isOverDuedate()
    {
        $now = Carbon::now();
        $duedate = Carbon::parse($this->duedate);

        return $duedate->lt($now);
    }
}
