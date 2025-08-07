<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'jira_account_id',
        'status',
    ];

    public function squads()
    {
        return $this->belongsToMany(Squad::class, 'employee_squad')->withTimestamps();
    }
}
