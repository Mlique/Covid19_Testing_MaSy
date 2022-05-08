<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TestBooking extends Model
{
    use HasFactory;
    protected $dates = ['date'];

    protected $fillable = ['date', 'time_slot', 'testRequest_id', 'nurse_id', 'Status'];

    public function testrequest()
    {
        return $this->belongsTo(TestRequest::class, 'testRequest_id');
    }
    public function setLogDateAttribute($value){
        $this->attributes['date'] = Carbon::createFromFormat('d-m-Y', $value)->format('Y-m-d');
    }
}
