<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [

        'name_en',
        'name_ar',
        'img',
        'type',
        'brand_id',
        'capacity',
        'back_capacity',
        'doors',
        'price',
        'discounted_price',
        'deposit',
    ];

    public function rent(){
        return $this->hasOne(Rent::class);
    }

    public function brand(){
        return $this->belongsTo(Brand::class);
    }
}
