<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'min_employees',
        'closed_day',
    ];

    public function storeAffiliations()
    {
        return $this->hasMany(StoreAffiliation::class);
    }
}