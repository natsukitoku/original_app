<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbroadingPlan extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function cities()
    {
        return $this->belongsTo(City::class);
    }

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }
}
