<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];


    public function suburb()
    {
        return $this->hasMany(Suburb::class,'suburb_id', 'id');
    }
    public function dependents()
    {
        return $this->hasMany(Dependent::class,'dependent_id', 'id');
    }


}