<?php

namespace App\Http\Controllers;

use App\Pelajaran;
use Illuminate\Http\Request;

class PelajaranController extends Controller
{
    public function pelajaran(Request $request){

        $this->validate($request, [
            'pelajaran' => ['required']
        ]);

        $matkul = new Pelajaran;
        $matkul->pelajaran = $request->pelajaran;
        $matkul->slug = \Str::slug($request->pelajaran);
        $matkul->save();
        return redirect()->to('pelajaran');
    }
    
    public function categori(){
        return view('Admin.Pelajaran.pelajaran', [
            'matkuls' => Pelajaran::latest()->paginate(),
        ]);
    }

    public function destroy($matkul){
        Pelajaran::where('id', $matkul)->delete();
        return redirect('pelajaran')->with('success', 'Nama Pelajaran berhasil dihapus');
    }
}
