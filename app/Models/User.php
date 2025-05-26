<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'remember_token'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $table = 'users'; // Menentukan nama tabel

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function mbtiResults()
    {
        return $this->hasOne(MbtiResult::class);
    }

    public function profile()
    {
        return $this->hasMany(StudentProfile::class);
    }

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class);
    }
}
