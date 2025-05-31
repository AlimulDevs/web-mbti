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
        'dimension_type'
    ];

    protected $table = 'students'; // Menentukan nama tabel

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
