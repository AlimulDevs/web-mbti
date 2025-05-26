<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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
