<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Question;
use App\Models\Student;
use Illuminate\Http\Request;

class ViewMiddlewWareWebController extends Controller
{
    public function homeIndex()
    {
        return view('home');
    }

    public function testMbtiIndex()
    {
        if (session()->get("remember_token") == null) {
            return redirect()->route('login.index');
        }

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

        return redirect("/")->with("success", "berhasil melakukan test mbti");

    }






}
