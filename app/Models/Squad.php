<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Squad extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'status',
    ];

    public function employees()
    {
        return $this->belongsToMany(Employee::class, 'employee_squad')->withTimestamps();
    }
}
