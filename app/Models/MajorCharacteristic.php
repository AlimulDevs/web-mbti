<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MajorCharacteristic extends Model
{
    use HasFactory;

    protected $fillable = ['major_id', 'indicator', 'weight'];

    protected $table = 'major_characteristics'; // Menentukan nama tabel

    public function major()
    {
        return $this->belongsTo(Major::class);
    }
}
