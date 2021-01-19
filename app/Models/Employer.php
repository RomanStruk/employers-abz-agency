<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'position_id',
        'salary',
        'head',
        'date_of_employment',
        'created_id',
        'updated_id',
    ];

    protected $casts = [
        'date_of_employment' => 'datetime',
    ];
}
