<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = ['user_id', 'nisn', 'nama', 'slug', 'kelas_id', 'status', 'semester', 'pelajaran_id'];
    protected $with = ['kelas', 'users', 'pelajarans'];

    public function kelas(){
        return $this->belongsTo(Kelas::class);
    }

    public function guru(){
        return $this->belongsTo(Guru::class);
    }

    public function pelajarans(){
        return $this->belongsToMany(Pelajaran::class);//->withPivot(['uts', 'uas'])->withTimestamps();
    }

    public function nilais(){
        return $this->belongsToMany(Nilai::class);
    }
    
    public function ujians(){
        return $this->hasMany('App\Ujian');
    }

    public function ujian(){
        return $this->hasOne('App\Ujian');
    }

    public function users(){
        return $this->belongsTo('App\User', 'user_id');
    }
    
}
