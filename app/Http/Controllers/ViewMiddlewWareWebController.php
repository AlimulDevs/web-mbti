<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use App\Models\CriteriaUser;
use App\Models\Major;
use App\Models\Question;
use App\Models\School;
use App\Models\SchoolCriteria;
use App\Models\SchoolCriteriaUser;
use App\Models\SchoolRecomStudent;
use App\Models\Student;
use Illuminate\Http\Request;

class ViewMiddlewWareWebController extends Controller
{
    public function homeIndex()
    {
        return view('home');
    }

    public function criteriaUpdate(){
        $check_student  = Student::where("user_id", session()->get("id"))->first();
        $check_student["is_setting"] = 1;

        $check_student->save();

        return redirect("/test-mbti/index");
    }

    public function testMbtiIndex()
    {
        if (session()->get("remember_token") == null) {
            return redirect()->route('login.index');
        }
        $check_student  = Student::where("user_id", session()->get("id"))->first();

        // if ($check_student["is_setting"] == 0 && $check_student["dimension_type"] == null) {
        //     return redirect("/update-criteria/index");
        // }


        $questions = Question::get();
        return view('frontend.testmbti', compact('questions'));
    }

    public function questionSave(Request $request)
    {
        $answers = [];

        $dimension_type = [
            "E" => 0,
            "I" => 0,
            "S" => 0,
            "N" => 0,
            "T" => 0,
            "F" => 0,
            "J" => 0,
            "P" => 0
        ];



        // Mengambil semua input yang berawalan 'question_'
        foreach ($request->all() as $key => $value) {
            // Mengecek apakah input tersebut adalah jawaban dari sebuah pertanyaan
            if (strpos($key, 'question_') === 0) {
                // Menyaring ID pertanyaan dari key (misalnya 'question_1', 'question_2', dst)
                $question_id = str_replace('question_', '', $key);

                $question  = Question::where('id', $question_id)->first();
                if ((int) $value > 3) {
                    $dimension_type[$question->response_type] = $dimension_type[$question->response_type] + 1;
                } elseif ((int) $value < 3) {
                    switch ($question->response_type) {
                        case 'I':
                            $dimension_type["E"] = $dimension_type["E"] + 1;
                            break;
                        case 'E':
                            $dimension_type["I"] = $dimension_type["I"] + 1;
                            break;
                        case 'S':
                            $dimension_type["N"] = $dimension_type["N"] + 1;
                            break;
                        case 'N':
                            $dimension_type["S"] = $dimension_type["S"] + 1;
                            break;
                        case 'T':
                            $dimension_type["F"] = $dimension_type["F"] + 1;
                            break;
                        case 'F':
                            $dimension_type["T"] = $dimension_type["T"] + 1;
                            break;
                        case 'J':
                            $dimension_type["P"] = $dimension_type["P"] + 1;
                            break;
                        case 'P':
                            $dimension_type["J"] = $dimension_type["J"] + 1;
                            break;
                        default:
                            # code...
                            break;
                    }
                }

                // Simpan jawaban
                $answers[] = [
                    'question_id' => $question_id,
                    'value' => (int) $value,
                    'user_id' => session()->get("id"), // jika autentikasi diaktifkan
                ];
            }
        }



        $dimension_student = "";

        if ($dimension_type["E"] > $dimension_type["I"]) {
            $dimension_student = $dimension_student . "E";
        } else {
            $dimension_student = $dimension_student . "I";
        }

        if ($dimension_type["S"] > $dimension_type["N"]) {
            $dimension_student = $dimension_student . "S";
        } else {
            $dimension_student = $dimension_student . "N";
        }

        if ($dimension_type["T"] > $dimension_type["F"]) {
            $dimension_student = $dimension_student . "T";
        } else {
            $dimension_student = $dimension_student . "F";
        }

        if ($dimension_type["J"] > $dimension_type["P"]) {
            $dimension_student = $dimension_student . "J";
        } else {
            $dimension_student = $dimension_student . "P";
        }


        $user_id = session()->get("id");
        $student = Student::where('user_id', $user_id)->first();
        $student->dimension_type = $dimension_student;
        $student->save();

        return redirect("/test-result/index")->with("success", "berhasil melakukan test mbti");
    }

    public function updateCriteriaIndex()
    {
        if (session()->get("remember_token") == null) {
            return redirect("/login/index");
        }

        $criteria_users = CriteriaUser::where("user_id", session()->get("id"))->get();
        return view('frontend.updatecriteria', compact('criteria_users'));
    }

    public function testResultIndex()
    {
        if (session()->get("remember_token") == null) {
            return redirect("/login/index");
        }

        $user_id = session()->get("id");


        $student = Student::where('user_id', $user_id)->with(["school_recom_students", "user"])->first();
        $majors = Major::where('personality_type', $student->dimension_type)->with(['school'])->get();


        SchoolRecomStudent::where('student_id', $student->id)->delete();
        foreach ($majors as $major) {
            $check = SchoolRecomStudent::where('student_id', $student->id)->where('school_id', $major->school_id)->first();
            if ($check) {
                continue;
            }
            $school_criteria_users = SchoolCriteriaUser::where('school_id', $major->school_id)
                ->where('user_id', $student->user_id)
                ->with(['criteria_user'])->get();

            $value = 0;
            foreach ($school_criteria_users as $school_criteria) {
                $count = $school_criteria["gap_mapping"] * $school_criteria["criteria_user"]["value"];
                $value = $value + $count;
            }

            SchoolRecomStudent::create([
                'student_id' => $student->id,
                'school_id' => $major->school_id,
                'value' => $value
            ]);
        }
        $get_recomended = SchoolRecomStudent::where("student_id", $student["id"])
            ->orderBy("value", "desc")->first();

        $get_school_and_major_recom = School::where("id", $get_recomended["school_id"])
            ->with(["majors" => function ($query) use ($student) {
                $query->where("personality_type", $student["dimension_type"]);
            }])
            ->first();


        // tambahan

        $data_id_school = [];
$student = Student::where('user_id', $user_id)->with(["school_recom_students", "user"])->first();
        foreach ($student["school_recom_students"] as $school_recom_student) {
            $data_id_school[] = $school_recom_student["school_id"];
        }

        $schools  = School::whereIn("id", $data_id_school)
            ->with(['school_criteria_users' => function ($query) use ($student) {
                $query->where("user_id", $student["user_id"]);
            },"majors" => function ($query) use ($student) {
                $query->where("personality_type", $student["dimension_type"]);
            }])
            ->get();
        $criteria_users = CriteriaUser::where("user_id", $student["user_id"])->get();
        // $criterias = CriteriaUser::where("user_id", $student["user_id"])->get();

        $school_recom = SchoolRecomStudent::where("student_id", $student["id"])->orderBy("value", "desc")->with(["school"])->get();

        foreach ($school_recom as $key => $school) {
            $school["ranking"] = $key + 1;
            foreach ($majors as $major) {
              if ($major["school_id"] == $school["school_id"]) {
               $major["ranking"] = $school["ranking"];
              }
            }
        }


        return view('frontend.testResult', compact('student', 'majors', 'get_school_and_major_recom', "schools", "criteria_users", "school_recom"));
    }
}
