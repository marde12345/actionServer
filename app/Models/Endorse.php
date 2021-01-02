<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endorse extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'inf_id',
        'cust_id',
        'plat_id',
        'days'
    ];
}
