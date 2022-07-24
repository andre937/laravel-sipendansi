<?php

namespace App\Http\Controllers;

use App\Nilai;
use App\Pelajaran;
use App\Siswa;
use App\Ujian;
use App\http\Requests\UjianRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class UjianController extends Controller
{
    public function index(){
        return view('Admin.Ujian.ujian', [
            'ujians' => Ujian::latest()->paginate(),
        ]);
    }

    public function create(){
        return view('Admin.Ujian.add', [
            'ujian' => new Ujian(),
            'siswas' => Siswa::get(),
            'pelajarans' => Pelajaran::get(),
        ]);
    }

    public function star(UjianRequest $request){
        $attr = $request->all();
        $attr['siswa_id'] = request('nisn');
        $attr['pelajaran_id'] = request('pelajaran');
        //$siswa = //digunakan bila ada tagsnya
        Ujian::create($attr);
        session()->flash('success', 'Peserta Ujian Berhasil Di Tambahkan');
        return redirect()->back();
    }

    public function store(UjianRequest $request){
        $attr = $request->all();
        $attr['siswa_id'] = request('nisn');
        $attr['pelajaran_id'] = request('pelajaran');
        //$siswa = //digunakan bila ada tagsnya
        Ujian::create($attr);
        session()->flash('success', 'Peserta Ujian Berhasil Di Tambahkan');
        return redirect('ujian');
    }

    public function buka(Ujian $ujian){
        URL::previous();
        $hasil = Nilai::all();
        return view('Admin.Ujian.hasil', ['hasil' => $hasil], compact('ujian'));
    }
    public function addnilai(Request $request,$id){
        $ujian = Ujian::find($id);
        $ujian->nilais()->attach(request('kd'),
        [
            'nilai_kd' => $request->nilai_kd ?? "Belum Tersedia", 
        ]);
        session()->flash('success', 'Nilai Berhasil Di tambahkan');
        return redirect('hasil/'.$ujian->id);
    }

    public function addhapus($id, $idkd){
        $ujian = Ujian::find($id);
        $ujian->nilais()->detach($idkd);
        session()->flash('success', 'Nilai Berhasil Terhapus');
        return redirect('hasil/'.$ujian->id);
    }

    public function deleteAll(){
        Ujian::whereNotNull('id')->delete();
        return redirect('ujian')->with('success', 'Data telah terhapus');
     }

    public function editnilai(Request $request, $id){
        $ujian = Ujian::find($id);
        $ujian->nilais()->updateExistingPivot($request->pk,['nilai_kd' => $request->value]);
    }

    public function destroy($id){
        $ujian = Ujian::find($id);
        $ujian->nilais()->detach();
        $ujian->delete();
        session()->flash('success', 'Peserta Ujian Berhasil Dihapus');
        return redirect()->back();
    }
}
