<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use App\Models\CriteriaUser;
use App\Models\School;
use App\Models\SchoolCriteria;
use App\Models\Student;
use Illuminate\Http\Request;

class CriteriaWebController extends Controller
{

    // Menyimpan kriteria baru
    public function create(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'profile' => 'required|integer',
            'value' => 'required|numeric',
        ]);

        // Simpan data
      $data_criteria =   Criteria::create($validatedData);

      $get_school  = School::get();

      foreach ($get_school as $school) {
        SchoolCriteria::create([
            'school_id' => $school->id,
            'criteria_id' => $data_criteria->id,
            'value' => 0,
        ]);
      }



        $data_student = Student::where("dimension_type",'!=',null)->with(['user'])->get();

        // foreach ($data_student as $student) {
        //     CriteriaUser::create([
        //         'user_id' => $student->user_id,  // ID Pengguna
        //         'criteria_id' => $validatedData['profile'],     // Nama Kriteria
        //         'code' => $validatedData['code'],     // Kode Kriteria
        //         'value' => $validatedData['value'],     // Nilai Bobot
        //     ]);
        // }

        // Redirect ke halaman index setelah menyimpan
        return redirect('/admin/criteria/index')->with('success', 'Kriteria berhasil ditambahkan');
    }
    // Mengupdate kriteria yang ada
    public function update(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'profile' => 'required|integer',
            'value' => 'required|numeric',
        ]);

        // Cari kriteria dan update data
        $criteria = Criteria::findOrFail($request->id);
        $criteria->update($validatedData);

        // Redirect ke halaman index setelah update
        return redirect('/admin/criteria/index')->with('success', 'Kriteria berhasil diperbarui');
    }


    public function delete($id)
    {
        // Cari dan hapus data kriteria
        $criteria = Criteria::findOrFail($id);
        SchoolCriteria::where('criteria_id', $criteria->id)->delete();
        $criteria->delete();

        // Redirect ke halaman index setelah delete
        return redirect('/admin/criteria/index')->with('success', 'Kriteria berhasil dihapus');
    }
}
