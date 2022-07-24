<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $fillable = ['nama_jabatan'];

    public function guru()
    {
        return $this->hasOne(Guru::class);
    }

    public function gurus()
    {
        return $this->hasMany(Guru::class);
    }
}
