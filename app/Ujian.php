<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    protected $fillable = ['siswa_id', 'pelajaran_id','nilai_id', 'nama_ujian'];
    protected $with = ['siswa', 'nilais', 'pelajaran'];

    public function pelajaran(){
        return $this->belongsTo(Pelajaran::class);
    }
    public function siswa(){
        return $this->belongsTo('App\siswa', 'siswa_id');
    }
    public function nilais(){
        return $this->belongsToMany(Nilai::class)->withPivot(['nilai_kd'])->withTimestamps();;
    }
}
