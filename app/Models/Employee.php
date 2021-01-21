<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
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
        'photo'
    ];

    protected $casts = [
        'date_of_employment' => 'date',
    ];

    public function position(){
        return $this->belongsTo(Position::class);
    }

    public function head(){
        return $this->belongsTo(Employee::class);
    }
}
