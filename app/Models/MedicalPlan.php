<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalPlan extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function medicalAid()
    {
        return $this->belongsTo(MedicalAid::class, 'medical_aid_id');
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function dependent()
    {
        return $this->hasMany(Dependent::class, 'dependent_id', 'id');
    }
}
