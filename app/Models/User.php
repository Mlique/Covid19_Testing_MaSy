<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'contact_number', 'phone',
    'addressLine1',
    'addressLine2',
    'suburb_id',
    'medical_aid',
    'medical_plan_id',
    'medical_aid_no',
    'main_member_id',];


    // protected $dispatchesEvents = [
    //     'created' =>UserCreatedEvent::class,
    // ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    /**
     * Check if the user has a role
     * @param string $role
     * $return bool
     */
    public function hasAnyRole(string $role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }

    /**
     * Check if the user has any given role
     * @param array $role
     * $return bool
     */
    public function suburb()
    {
        return $this->belongsTo(Suburb::class, 'suburb_id');
    }
    public function hasAnyRoles(array $role)
    {
        return null !== $this->roles()->whereIn('name', $role)->first();
    }
    public function dependent()
    {
        return $this->hasMany(Dependent::class,'dependent_id', 'id');
    }
    public function testrequests()
    {
        return $this->hasMany(Test_Request::class);
    }
    public function medical_aid()
    {
        return $this->hasMany(MedicalAid::class, 'medical_aid', 'id');
    }
    public function medicalPlan()
    {
        return $this->belongsTo(MedicalPlan::class, 'medical_plan_id');
    }
    public function main_members()
    {
        return $this->hasOne(MainMember::class, 'main_member_id');
    }
}

