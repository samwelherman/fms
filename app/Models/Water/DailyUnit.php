<?php

namespace App\Models\Water;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyUnit extends Model
{
    use HasFactory;


    protected $table = "daily_units";


    protected $fillable = [
        'meter',
    ];


}
