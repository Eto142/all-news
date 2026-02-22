<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharedPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'writeup',
        'token',
        'phone_share',
        'phone',
    ];
}
