<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'personality_type',
        'school_id'
    ];

    protected $table = 'majors'; // Menentukan nama tabel


    public function school()
    {
        return $this->belongsTo(School::class);
    }



    public function profileMatchingResults()
    {
        return $this->hasMany(ProfileMatchingResult::class);
    }
}
