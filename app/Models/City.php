<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function abroading_plans()
    {
        return $this->hasMany(AbroadingPlan::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
