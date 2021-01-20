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
    ];

    protected $casts = [
        'date_of_employment' => 'datetime:d.m.y',
        'updated_at' => 'datetime:d.m.y',
        'created_at' => 'datetime:d.m.y',
    ];

    public function position(){
        return $this->belongsTo(Position::class);
    }

    public function head(){
        return $this->belongsTo(Employee::class);
    }
}
