<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedHistory extends Model
{
    use HasFactory;

    protected $table = "med_histories";

    protected $fillable = [
        'user_id',
        'name',
        'med_history',
        'surg_history',
        'medications',
        'allergies',
        'date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
