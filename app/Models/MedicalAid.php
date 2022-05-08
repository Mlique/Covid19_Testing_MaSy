<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalAid extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function medical_plan()
    {
        return $this->hasMany(MedicalPlan::class, 'medical_plan_id', 'id');
    }
    public function dependent()
    {
        return $this->hasMany(Dependent::class, 'dependent_id', 'id');
    }

}

