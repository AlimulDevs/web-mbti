<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use App\Models\CriteriaUser;
use App\Models\Major;
use App\Models\Question;
use App\Models\School;
use App\Models\SchoolCriteria;
use App\Models\SchoolRecomStudent;
use App\Models\Student;
use Illuminate\Http\Request;

class ViewMiddlewareAdminWebController extends Controller
{
    public function dashboardIndex()
    {
        return view('admin.dashboard');
    }
    public function criteriaIndex()
    {
        $criterias = Criteria::get();
        return view('admin.criteria.index', compact('criterias'));
    }
    public function schoolIndex()
    {
        $schools = School::get();
        return view('admin.school.index', compact('schools'));
    }
    public function majorIndex()
    {
        $schools = School::get();
        $majors = Major::get();
        return view('admin.major.index', compact('schools', 'majors'));
    }
    public function questionIndex()
    {
        $questions  = Question::get();

        return view('admin.question.index', compact('questions'));
    }
    public function studentIndex()
    {
        $students  = Student::get();

        return view('admin.student.index', compact('students'));
    }
    public function profileMatchingIndex()
    {
        $school_criteria = SchoolCriteria::get();

        $schools  = School::get();
        $criterias = Criteria::get();

        return view('admin.profile-matching.index', compact('schools', "criterias"));
    }
    public function testResultIndex()
    {

        $students = Student::where("dimension_type", "!=", null)->get();
        return view('admin.test-result.index', compact("students"));
    }
    public function testResultDetailIndex($id)
    {

        $student = Student::where("id", $id)->with(["school_recom_students", "user"])->first();
        $data_id_school = [];

        foreach ($student["school_recom_students"] as $school_recom_student) {
            $data_id_school[] = $school_recom_student["school_id"];
        }

        $schools  = School::whereIn("id", $data_id_school)
        ->with(['school_criteria_users' => function ($query) use ($student){
            $query->where("user_id", $student["user_id"]);
        }])
        ->get();
        $criteria_users = CriteriaUser::where("user_id", $student["user_id"])->get();
        // $criterias = CriteriaUser::where("user_id", $student["user_id"])->get();

        $school_recom = SchoolRecomStudent::where("student_id", $id)->orderBy("value", "desc")->with(["school"])->get();
        $get_school_and_major_recom = School::where("id", $school_recom[0]["school_id"])
        ->with(["majors" => function ($query) use ($student){
            $query->where("personality_type", $student["dimension_type"]);
        }])
        ->first();


        return view('admin.test-result.detail', compact("student", "schools", "criteria_users", "school_recom", "get_school_and_major_recom"));
    }
}
