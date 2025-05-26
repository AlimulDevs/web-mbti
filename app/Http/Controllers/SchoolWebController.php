<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\School;
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
       School::create($validatedData);

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
