<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    protected $table = 'pelajarans';
    protected $fillable = ['pelajaran', 'slug'];
    
    public function siswa(){
        return $this->belongsToMany(Siswa::class);//->withPivot(['uts', 'uas']);
    }
    public function nilai(){
        return $this->belongsToMany(Nilai::class)->withPivot(['nilai_kd']);;
    }
    public function ujian(){
        return $this->hasMany(Ujian::class);
    }
}
