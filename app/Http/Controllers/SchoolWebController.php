<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use App\Models\School;
use App\Models\SchoolCriteria;
use Illuminate\Http\Request;

class SchoolWebController extends Controller
{
   // Menyimpan sekolah baru
   public function create(Request $request)
   {
       // Validasi input
       $validatedData = $request->validate([
           'school_name' => 'required|string|max:255',

       ]);

       // Simpan data
     $school =   School::create($validatedData);

     $criterias = Criteria::get();

     foreach ($criterias as $criteria) {
         SchoolCriteria::create([
             'criteria_id' => $criteria->id,
             'school_id' => $school->id,
             'value' => 0
         ]);
     }

       // Redirect ke halaman index setelah menyimpan
       return redirect('/admin/school/index')->with('success', 'sekolah berhasil ditambahkan');
   }
   // Mengupdate sekolah yang ada
   public function update(Request $request)
   {
       // Validasi input
       $validatedData = $request->validate([
           'school_name' => 'required|string|max:255',

       ]);

       // Cari sekolah dan update data
       $criteria = School::findOrFail($request->id);
       $criteria->update($validatedData);

       // Redirect ke halaman index setelah update
       return redirect('/admin/school/index')->with('success', 'sekolah berhasil diperbarui');
   }


   public function delete($id)
   {
       // Cari dan hapus data sekolah
       $criteria = School::findOrFail($id);
       $criteria->delete();

       // Redirect ke halaman index setelah delete
       return redirect('/admin/school/index')->with('success', 'sekolah berhasil dihapus');
   }
}
