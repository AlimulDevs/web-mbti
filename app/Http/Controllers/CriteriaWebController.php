<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
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
        Criteria::create($validatedData);

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
        $criteria->delete();

        // Redirect ke halaman index setelah delete
        return redirect('/admin/criteria/index')->with('success', 'Kriteria berhasil dihapus');
    }
}
