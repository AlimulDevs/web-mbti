<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MbtiResult extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'mbti_type'];

    protected $table = 'mbti_results'; // Menentukan nama tabel

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
