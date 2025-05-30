<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileMatchingResult extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'major_id', 'score'];

    protected $table = 'profile_matching_results'; // Menentukan nama tabel

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
