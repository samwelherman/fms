<?php

namespace App\Models\Water;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitPrice extends Model
{
    use HasFactory;

    protected $table = "unit_prices";


    protected $fillable = [
        'season',
        'price',
        'location'
    ];
}
