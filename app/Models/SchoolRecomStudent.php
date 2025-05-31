<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolRecomStudent extends Model
{
    protected $fillable = ['student_id', 'school_id','value'];

    protected $table = 'school_recom_students'; // Menentukan nama tabel

    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
