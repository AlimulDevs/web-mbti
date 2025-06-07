<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CriteriaUser extends Model
{
   // Menentukan nama tabel yang digunakan oleh model ini (jika tidak sesuai konvensi Laravel)
   protected $table = 'criteria_users';

   // Menentukan kolom yang boleh diisi secara mass-assignment
   protected $fillable = [
       'user_id',  // ID Pengguna
       'criteria_id',     // Nama Kriteria
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

   public function criteria(){
      return $this->belongsTo(Criteria::class);
   }
}
