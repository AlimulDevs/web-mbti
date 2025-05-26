<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionWebController extends Controller
{
    // Menyimpan soal baru
    public function create(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'question_text' => 'required|string|max:255',
            'dimension' => 'required|string|max:255',
            'response_type' => 'required|string|max:255',
        ]);

        // Simpan data
        Question::create($validatedData);

        // Redirect ke halaman index setelah menyimpan
        return redirect('/admin/question/index')->with('success', 'soal berhasil ditambahkan');
    }
    // Mengupdate soal yang ada
    public function update(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'question_text' => 'required|string|max:255',
            'dimension' => 'required|string|max:255',
            'response_type' => 'required|string|max:255',
        ]);

        // Cari soal dan update data
        $criteria = Question::findOrFail($request->id);
        $criteria->update($validatedData);

        // Redirect ke halaman index setelah update
        return redirect('/admin/question/index')->with('success', 'soal berhasil diperbarui');
    }


    public function delete($id)
    {
        // Cari dan hapus data soal
        $criteria = Question::findOrFail($id);
        $criteria->delete();

        // Redirect ke halaman index setelah delete
        return redirect('/admin/question/index')->with('success', 'soal berhasil dihapus');
    }
}
