<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolCriteriaUser extends Model
{
    protected $fillable = [
        'school_id',
        'user_id',
        'criteria_user_id',
        'school_criteria_id',
        'value'
    ];

    protected $table = 'school_criteria_users'; // Menentukan nama tabel

    protected $appends = [
        'gap',
        'gap_mapping',

    ];

    public function criteria_user()
    {
        return $this->belongsTo(CriteriaUser::class);
    }

    public function school_criteria()
    {
        return $this->belongsTo(SchoolCriteria::class);
    }

    public function getGapAttribute()
    {

        $criteria_user = CriteriaUser::where('id', $this->criteria_user_id)->first();

        return $this->value - $criteria_user->profile;
    }



    public function getGapMappingAttribute()
    {
        $criteria_user = CriteriaUser::find($this->criteria_user_id);

        $gap = $this->value - $criteria_user->profile;
        $mapping_gap  = 0;

        switch ($gap) {
            case 0:
                $mapping_gap = 6;
                break;
            case 1:
                $mapping_gap = 5.5;
                break;
            case 2:
                $mapping_gap = 4.5;

                break;
            case 3:
                $mapping_gap = 3.5;
                break;
            case 4:
                $mapping_gap = 2.5;
                break;
            case 5:
                $mapping_gap = 1.5;
                break;
            case -1:
                $mapping_gap = 5;
                break;
            case -2:
                $mapping_gap = 4;
                break;
            case -3:
                $mapping_gap = 3;
                break;
            case -4:
                $mapping_gap = 2;
                break;
            case -5:
                $mapping_gap = 1;
                break;
            default:
                $mapping_gap = 0;
                break;
        }
        return $mapping_gap;
    }



    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
