<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Criteria extends Model
{
    // Menentukan nama tabel yang digunakan oleh model ini (jika tidak sesuai konvensi Laravel)
    protected $table = 'criterias';

    // Menentukan kolom yang boleh diisi secara mass-assignment
    protected $fillable = [
        'name',     // Nama Kriteria
        'code',     // Kode Kriteria
        'profile',  // Profile Kriteria
        'value',    // Nilai Bobot
    ];

    // Menentukan kolom yang harus dijaga (dianggap tidak dapat diubah)
    protected $guarded = [];

    // Jika menggunakan tipe data decimal untuk value, bisa juga ditambahkan cast
    protected $casts = [
        'value' => 'decimal:2', // Mengonversi value menjadi decimal dengan 2 angka di belakang koma
    ];

    // Jika kolom 'profile' memerlukan nilai default atau konversi lainnya
    protected $attributes = [
        'profile' => 0, // Default profile adalah 0
    ];
}
