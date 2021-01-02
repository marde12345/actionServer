<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'platform',
        'url',
        'price',
        'per_days',
        'follower',
        'user_id'
    ];
}
