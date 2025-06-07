<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Criteria;
use App\Models\CriteriaUser;
use Illuminate\Http\Request;

class CriteriaUserWebController extends Controller
{
    public function update(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'profile' => 'required|integer',
            'value' => 'required|numeric',
        ]);

        // Cari kriteria dan update data
        $criteria = CriteriaUser::findOrFail($request->id);
        $criteria->update([
            'profile' => $validatedData['profile'],  // Profile Kriteria
            'value' => $validatedData['value'],    // Nilai Bobot
        ]);

        // Redirect ke halaman index setelah update
        return redirect('/update-criteria/index')->with('success', 'Kriteria berhasil diperbarui');
    }
}
