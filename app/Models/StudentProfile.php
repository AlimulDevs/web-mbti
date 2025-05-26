<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'indicator', 'value'];

    protected $table = 'student_profiles'; // Menentukan nama tabel

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
