<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feeds extends Model
{
    protected $fillable =[
        'file_type',
        'caption',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
