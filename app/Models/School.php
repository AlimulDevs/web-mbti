<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['school_name'];

    protected $table = 'schools'; // Menentukan nama tabel

    public function school_criterias()
    {
        return $this->hasMany(SchoolCriteria::class);
    }

    public function school_criteria_users()
    {
        return $this->hasMany(SchoolCriteriaUser::class);
    }

    public function majors(){
        return $this->hasMany(Major::class);
    }
}
