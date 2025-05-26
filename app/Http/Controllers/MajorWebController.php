<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorWebController extends Controller
{
    // Menyimpan jurusan baru
   public function create(Request $request)
   {
       // Validasi input
       $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'personality_type' => 'required|string|max:255',
        'school_id' => 'required|integer',

       ]);

       // Simpan data
       Major::create($validatedData);

       // Redirect ke halaman index setelah menyimpan
       return redirect('/admin/major/index')->with('success', 'jurusan berhasil ditambahkan');
   }
   // Mengupdate jurusan yang ada
   public function update(Request $request)
   {
       // Validasi input
       $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'personality_type' => 'required|string|max:255',
        'school_id' => 'required|integer',

       ]);

       // Cari jurusan dan update data
       $criteria = Major::findOrFail($request->id);
       $criteria->update($validatedData);

       // Redirect ke halaman index setelah update
       return redirect('/admin/major/index')->with('success', 'jurusan berhasil diperbarui');
   }


   public function delete($id)
   {
       // Cari dan hapus data jurusan
       $criteria = Major::findOrFail($id);
       $criteria->delete();

       // Redirect ke halaman index setelah delete
       return redirect('/admin/major/index')->with('success', 'jurusan berhasil dihapus');
   }
}
