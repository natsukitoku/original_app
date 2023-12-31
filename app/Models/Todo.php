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
        if ($this->done !== 1) {
            $now = Carbon::now();
            $duedate = Carbon::parse($this->duedate);

            return $duedate->subWeek()->lt($now);
        }

        return false;
    }

    public function isDuedate()
    {
        if ($this->done !== 1) {
            $duedate = Carbon::parse($this->duedate);

            return $duedate->isToday();
        }

        return false;
    }

    public function isOverDuedate()
    {
        if ($this->done !== 1) {
            $now = Carbon::now();
            $duedate = Carbon::parse($this->duedate);

            return $duedate->lt($now);
        }

        return false;
    }
}
