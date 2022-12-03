<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    use HasFactory;

    protected $fillable = [
        'daily_limit',
        'daily_cost',
        'weekly_limit',
        'weekly_cost',
        'monthly_limit',
        'monthly_cost',
        'car_id',
    ];
}
