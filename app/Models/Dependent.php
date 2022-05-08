<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dependent extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'email_address',
        'email',
        'id_number',
        'contact_number',
        'addressLine1',
        'addressLine2',
        'suburb_id',
        'medical_aid',
        'medical_plan_id',
        'medical_aid_no',
        'main_member_id',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // public function testRequests()
    // {
    //     return $this->belongsToMany(TestRequest::class, 'dependent_test_request', 'test_request_id','test_subject_id');
    // }
    public function testRequest()
    {
        return $this->hasMany(TestRequest::class);
    }
    public function suburb()
    {
        return $this->belongsTo(Suburb::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function medicalPlan()
    {
        return $this->belongsTo(MedicalPlan::class, 'medical_plan_id');
    }
}
