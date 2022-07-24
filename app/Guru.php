<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = ['user_id','nip', 'nama_guru','jabatan_id'];
    protected $with = ['users','jabatans'];

    public function users(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function siswas(){
        return $this->hasMany(Siswa::class);
    }

    public function jabatans(){
        return $this->belongsTo('App\Jabatan', 'jabatan_id');
    }

    public function kelase(){
        return $this->hasMany(Kelas::class);
    }
    public function kelas(){
        return $this->hasOne(Kelas::class);
    }
}
