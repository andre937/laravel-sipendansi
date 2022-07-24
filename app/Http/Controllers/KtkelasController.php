<?php

namespace App\Http\Controllers;

use App\http\Requests\KtkelasRequest;
use App\Ktkelas;

class KtkelasController extends Controller
{
    public function index(){
        return view('Admin.Ktkelas.ktkelas', [
            'ktkelases' => Ktkelas::latest()->paginate(),
        ]);
    }
    
    public function store(KtkelasRequest $request){

        $attr = $request->all();
        //$siswa = //digunakan bila ada tagsnya
        $slug = \Str::slug($request->nmkelas);
        $attr['slug'] = $slug;
        Ktkelas::create($attr);
        session()->flash('success', 'Kelas Berhasil Di Tambahkan');
        return redirect('ktkelas');
    }

    public function destroy($ktkelas){
        Ktkelas::where('id', $ktkelas)->delete();
        return redirect('ktkelas')->with('success', 'Kelas berhasil dihapus');
    }
}
