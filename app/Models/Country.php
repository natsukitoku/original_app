<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Overtrue\LaravelFavorite\Traits\Favoriteable;

class Country extends Model
{
    use HasFactory, Favoriteable;

    public function visa_information()
    {
        return $this->hasOne(VisaInformation::class);
    }

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
