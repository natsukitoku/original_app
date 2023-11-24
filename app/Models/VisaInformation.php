<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisaInformation extends Model
{
    use HasFactory;

    public function countries()
    {
        return $this->hasOne(Country::class);
    }

}
