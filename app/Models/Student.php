<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'school_name',
        'user_id',
        'class_name',
        'criteria',
        'dimension_type',
        'is_setting',
    ];

    protected $table = 'students'; // Menentukan nama tabel

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function school_recom_students()
    {
        return $this->hasMany(SchoolRecomStudent::class);
    }
}
