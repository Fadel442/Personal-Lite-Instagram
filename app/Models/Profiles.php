<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    protected $fillable = [
        'username',
        'name',
        'bio',
        'profile_img',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
