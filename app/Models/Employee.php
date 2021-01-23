<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Employee extends Model
{
    use NodeTrait;
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'email',
        'position_id',
        'salary',
        'date_of_employment',
        'photo'
    ];

    protected $casts = [
        'date_of_employment' => 'date',
    ];

    public function position(){
        return $this->belongsTo(Position::class);
    }
}
