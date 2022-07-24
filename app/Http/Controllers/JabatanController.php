<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jabatan;
class JabatanController extends Controller
{
    public function store(Request $request){

        $this->validate($request, [
            'nama_jabatan' => ['required']
        ]);

        $jabatan = new Jabatan;
        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->save();
        return redirect()->to('jabatan');
    }
    
    public function index(){
        return view('Admin.Jabatan.jabatan', [
            'jabatans' => Jabatan::latest()->paginate(),
        ]);
    }

    public function destroy($jabatan){
        Jabatan::where('id', $jabatan)->delete();
        return redirect('jabatan')->with('success', 'Nama Jabatan berhasil dihapus');
    }
}
