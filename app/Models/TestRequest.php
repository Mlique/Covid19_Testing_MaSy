<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestRequest extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'requestor_id',
        'suburb_id',
        'addressLine1',
        'addressLine2',
        'number_of_people',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'requestor_id');
    }
    public function dependents()
    {
        return $this->belongsTo(Dependent::class, 'test_subject_id');
    }

    public function suburb()
    {
        return $this->belongsTo(Suburb::class, 'suburb_id', 'id');
    }
    public function testBookings()
    {
        return $this->hasMany(TestBookings::class);
    }
}
