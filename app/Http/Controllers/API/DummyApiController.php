<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use App\Models\School;
use App\Models\SchoolCriteria;
use Illuminate\Http\Request;

class DummyApiController extends Controller
{
     public function createSchoolCriteria(){
        $criterias = Criteria::get();
        $schools = School::get();
        foreach ($criterias as $criteria) {
            foreach ($schools as $school) {
                $check = SchoolCriteria::where('criteria_id', $criteria->id)->where('school_id', $school->id)->first();
                if ($check) {
                    continue;
                }

                SchoolCriteria::create([
                    'criteria_id' => $criteria->id,
                    'school_id' => $school->id,
                    'value' => 0
                ]);
            }
        }
     }
}
