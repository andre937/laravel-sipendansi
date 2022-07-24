<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'no_induk','username', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function siswa(){
        return $this->hasOne('App\Siswa');
    }

    public function guru(){
        return $this->hasOne('App\Guru');
    }

    public function isAdmin()
    {
        return $this->username == "Andrea Wijaya Kusuma";
    }

    public function hasRole($role)
    {
        return User::where('role', $role)->get();
    }

}
