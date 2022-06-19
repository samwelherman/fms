<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [

        'projectNo',
        'projectName',
        'category',
        'client',
        'progress',
        'startDate',
        'endDate',
        'billingType',
        'price',
        'estimateHour',
        'status',
        'demoUrl',
        'subCompany',
        'assign',
        'desc',
    ];


    
}
