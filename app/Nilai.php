<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = ['kd'];
    
    public function siswa(){
        return $this->belongsToMany(Siswa::class);
    }
    public function pelajarans(){
        return $this->belongsToMany(Pelajaran::class);
    }
    public function ujian(){
        return $this->belongsToMany(Ujian::class)->withPivot(['nilai_kd']);
    }
}
