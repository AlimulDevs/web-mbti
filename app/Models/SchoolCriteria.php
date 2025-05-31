<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SchoolCriteria extends Model
{
    protected $fillable = ['school_id', 'criteria_id', 'value'];

    protected $table = 'school_criterias'; // Menentukan nama tabel

    protected $appends = [
        'gap',
        'gap_mapping'
    ];

    public function criteria()
    {
        return $this->belongsTo(Criteria::class);
    }

    public function getGapAttribute()
    {
        $criteria = Criteria::find($this->criteria_id);
        return $this->value - $criteria->profile;
    }

    public function getGapMappingAttribute()
    {
        $criteria = Criteria::find($this->criteria_id);
        $gap = $this->value - $criteria->profile;
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
