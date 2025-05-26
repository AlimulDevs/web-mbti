<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use App\Models\Major;
use App\Models\Question;
use App\Models\School;
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
}
