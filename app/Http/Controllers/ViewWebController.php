<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;

class ViewWebController extends Controller
{
   public function registerIndex()
    {
        return view('auth.register');
    }
    public function loginIndex()
    {
        return view('auth.login');
    }

    public function homeIndex(){
$is_test = false;

if (session()->get("remember_token") != null) {
    $check_student = Student::where("user_id", session()->get("id"))->first();
    if ($check_student != null && $check_student["dimension_type"] != null) {
        $is_test = true;
    }
}

        return view("frontend.welcome", compact("is_test"));
    }
}
