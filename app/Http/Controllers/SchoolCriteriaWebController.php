<?php

namespace App\Http\Controllers;

use App\Models\School;
use App\Models\SchoolCriteria;
use Illuminate\Http\Request;

class SchoolCriteriaWebController extends Controller
{
    public function update(Request $request)
    {

        // Validasi input
        $request->validate([
            'id' => 'required|exists:schools,id', // Pastikan sekolah ada
            'school_name' => 'required|string',  // Nama sekolah harus ada
            'criteria_values' => 'required|array', // Pastikan criteria_values adalah array
        ]);

        // Temukan sekolah berdasarkan ID
        $school = School::findOrFail($request->id);

        // Update nama sekolah
        $school->school_name = $request->school_name;
        $school->save(); // Simpan perubahan nama sekolah

        // Update setiap nilai kriteria
        foreach ($request->criteria_values as $index => $value) {
            // Temukan SchoolCriteria terkait berdasarkan school_id dan criteria_id
            $criteria = $school->school_criterias()->where('criteria_id', $index + 1)->first();

            if ($criteria) {
                // Update nilai kriteria jika ditemukan
                $criteria->value = $value;
                $criteria->save();
            }
        }

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Data Sekolah berhasil diperbarui.');
    }
}
