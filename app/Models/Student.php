<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class Student extends Authenticatable
{
    use  Notifiable;
    protected $fillable = [
        'name',
        'email',
        'password',
        'date_of_birth',
        'passport_number',
    ];

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
