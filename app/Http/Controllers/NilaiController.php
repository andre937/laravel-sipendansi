<?php

namespace App\Http\Controllers;

use App\Nilai;
use App\http\Requests\NilaiRequest;

class NilaiController extends Controller
{
    public function index(){
        return view('Admin.Nilai.nilai', [
            'nilais' => Nilai::latest()->paginate(),
        ]);
    }
    
    public function store(NilaiRequest $request){

        $attr = $request->all();
        //$siswa = //digunakan bila ada tagsnya
        Nilai::create($attr);
        session()->flash('success', 'Nomer KD Berhasil Di Tambahkan');
        return redirect('nilai');
    }

    public function destroy($nilai){
        Nilai::where('id', $nilai)->delete();
        return redirect('nilai')->with('success', 'Nomer KD berhasil dihapus');
    }
}
