<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suburb extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function testRequests()
    {
        return $this->hasMany(TestRequest::class,'testRequest_id', 'id');
    }

    public function dependents()
    {
        return $this->hasMany(Dependent::class,'dependent_id', 'id');
    }
}
