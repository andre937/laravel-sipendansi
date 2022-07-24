<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ktkelas extends Model
{
    protected $table = 'ktkelas';
    protected $fillable = ['nmkelas', 'slug'];
    
    public function siswas(){
        return $this->hasMany(Siswa::class);
    }

}
