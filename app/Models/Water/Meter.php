<?php

namespace App\Models\Water;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meter extends Model
{
    use HasFactory;

     protected $table = "meters";


    protected $fillable = [
        'name',
        'location',
        'regNo',
    ];
}
