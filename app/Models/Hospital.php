<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;

    protected $table = "hospitals";

    protected $fillable = [
        'name',
        'address',
        'contactnumber',
        'beds',
        'hospital_id',
    ];

    //for the appointment
    public function appointment()
    {
        return $this->hasMany(Appointment::class);
    }

    //for the assignemnt of hospital to hospital staff
    public function assignUser()
    {
        return $this->hasMany(User::class);
    }

    
}
