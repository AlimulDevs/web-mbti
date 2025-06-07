<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use App\Models\CriteriaUser;
use App\Models\SchoolCriteria;
use App\Models\SchoolCriteriaUser;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthWebController extends Controller
{
    public function login(Request $request)
    {
        $data = User::where("email", $request->email)->first();

        if ($data == null) {

            return redirect("/login/index")->with("failed", "email anda tidak terdaftar");
        }

        if (Hash::check($request->password, $data->password)) {

            $new_token =  Str::random(60);
            $data->remember_token = $new_token;
            $data->save();

            $request->session()->put('name', $data->name);

            $request->session()->put('id', $data->id);
            $request->session()->put('role', $data->role);
            $check_student = Student::where("user_id", $data->id)->first();
            if ($check_student != null && $check_student["dimension_type"] == null) {
                $data_criteria = Criteria::get();

                foreach ($data_criteria as $criteria) {
                    $check_criteria_user = CriteriaUser::where("user_id", $data->id)->where("criteria_id", $criteria->id)->first();
                    if ($check_criteria_user == null) {
                        CriteriaUser::create([
                            'user_id' => $data->id,  // ID Pengguna
                            'criteria_id' => $criteria->id,     // Nama Kriteria
                            'code' => $criteria->code,     // Kode Kriteria
                            'profile' => $criteria->profile,  // Profile Kriteria
                            'value' => $criteria->value,    // Nilai Bobot
                        ]);
                    }
                }
                $data_school_criterias = SchoolCriteria::get();

                foreach ($data_school_criterias as $data_school_criteria) {
                    $check_school_criteria_user = SchoolCriteriaUser::where("user_id", $data->id)->where("school_criteria_id", $data_school_criteria->id)->first();
                    if ($check_school_criteria_user != null) {
                        continue;
                    }

                    $get_criteria_user = CriteriaUser::where('criteria_id', $data_school_criteria->criteria_id)
                    ->where('user_id', $data->id)
                    ->first();

                    SchoolCriteriaUser::create([
                        'school_id' => $data_school_criteria->school_id,
                        'user_id' => $data->id,
                        'criteria_user_id' => $get_criteria_user->id,
                        'school_criteria_id' => $data_school_criteria->id,
                        'value' => $data_school_criteria->value
                    ]);
                }
            }

            $request->session()->put('remember_token', $new_token);
            if ($data->role == "admin") {
                return redirect("/admin/dashboard/index")->with("success", "Anda berhasil login");
            }
            return redirect("/")->with("success", "Anda berhasil login");
        } else {
            return redirect("/login/index")->with("failed", "password anda salah");
        }
    }

    public function register(Request $request)
    {
        $data_user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => "siswa",
        ]);

        Student::create([
            'school_name' => $request->school_name,
            'user_id' => $data_user->id,
            'class_name'  => $request->class_name
        ]);


        return redirect("/login/index")->with("success", "berhasil membuat akun");
    }

    public function logout()
    {

        session()->flush();

        return redirect("/")->with("success", "Anda berhasil logout");
    }
}
