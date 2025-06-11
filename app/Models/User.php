<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail; // <-- Tambahkan ini
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', // Tambahkan kolom name
        'email',
        'password',
        'role', // Tambahkan kolom role
    ];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // Di dalam model User.php
public function uploads()
{
    return $this->hasMany(Upload::class);
}



}
