<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbroadingPlan extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function todos()
    {
        return $this->hasMany(Todo::class);
    }

    public function reviews()
    {
        $this->hasMany(Review::class);
    }
}
