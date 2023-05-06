<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'employee_type',
    ];

    public static $employeeTypes = [
        1 => 'マネージャー',
        2 => '新人',
        3 => '社員',
    ];

    public function requestedOffs()
    {
        return $this->hasMany(RequestedOff::class);
    }

    public function workdays()
    {
        return $this->hasOne(Workday::class);
    }

    public function storeAffiliations()
    {
        return $this->hasMany(StoreAffiliation::class);
    }
}