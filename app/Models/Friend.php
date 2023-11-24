<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;


    // フォローしている側のユーザー
    public function follower()
    {
        return $this->belongsTo(User::class);
    }

    // フォローされている側のユーザー
    public function followee()
    {
        return $this->hasOne(User::class, 'followee_id');
    }
}
