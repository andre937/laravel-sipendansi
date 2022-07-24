<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = ['guru_id', 'kelas', 'slug', 'awal_tahun', 'akhir_tahun'];
    protected $with = ['guru'];
    
    public function siswas(){
        return $this->hasMany(Siswa::class);
    }

    public function guru(){
        return $this->belongsTo('App\Guru', 'guru_id');
    }
}
