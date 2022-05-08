<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainMember extends Model
{
    use HasFactory;
    protected $fillable = ['first_name',
    'last_name', 'email_address', 'contact_number', 'id_number',
    'addressLine1',
    'addressLine2',
    'suburb_id',
    'medical_aid_YN',
    'medical_plan_id',
    'medical_aid_no',
    'main_member_id',];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
