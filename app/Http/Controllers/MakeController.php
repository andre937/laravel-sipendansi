<?php

namespace App\Http\Controllers;

use App\http\Requests\KelasRequest;
use Illuminate\Http\Request;
use App\{Kelas, Siswa, Guru, User};

class MakeController extends Controller
{
    public function index(){
        return view('Admin.Kelas.kelas', [
            'kelases' => Kelas::latest()->paginate(),
        ]);
    }

    public function create(){
        return view('Admin.Kelas.create', [
            'kelas' => new Kelas(),
            'gurus' => Guru::get(),
            //'pelajarans' => Pelajaran::get(),
        ]);
    }
    
    public function store(KelasRequest $request){
        $attr = $request->all();
        $slug = \Str::slug(request('kelas'));
        $attr['slug'] = $slug;
        $attr['guru_id'] = request('nama_guru');
        //$siswa = //digunakan bila ada tagsnya
        Kelas::create($attr);
        session()->flash('success', 'Kelas Berhasil Ditambahkan');
        return redirect('kelas');
    }

    public function buka(Kelas $kelas){
        $siswa = Siswa::all();
        return view('Admin.Kelas.buka', ['siswa'=> $siswa], compact('kelas'));
    }

    public function edit(Kelas $kelas){
        return view('Admin.Kelas.kelas-edit', [
            'kelas' => $kelas,
            'gurus' => Guru::get(),
            //'pelajarans' => Pelajaran::get(),
        ]);
    }

    public function tambahkan(Request $request, $id){
        
        $this->validate($request, [
            'nama_guru' => "required|unique:kelas,guru_id, $id",
            'kelas' => "required"
        ]);
        $kelas = Kelas::findOrFail($id);
        $attr = $request->all();
        $slug = \Str::slug(request('kelas'));
        $attr['slug'] = $slug;
        $attr['guru_id'] = request('nama_guru');
        $kelas->update($attr);
        session()->flash('success', 'Data Siswa Berhasil Di Edit');
        //$siswa->pelajarans()->sync(request('pelajarans'));
        return redirect('kelas');
    }

    public function add(){
        return view('Admin.kelas.add', [
            'siswa' => new Siswa(),
            'kelases' => Kelas::get(),
            'guru' => Guru::get(),
            'user' => User::get(),
        ],);
    }

    public function tambah(Request $request){

        $user = new User;
        $user->no_induk = $request->nisn;
        $user->role = 'Siswa';
        $user->username = $request->nama;
        $user->password = bcrypt(request('nisn'));
        $user->remember_token = str::random(60);
        $user->save();
        //$siswa = //digunakan bila ada tagsnya
        $request->request->add(['user_id' => $user->id]);
        $attr = $request->all();
        $slug = \Str::slug(request('nama'));
        $attr['slug'] = $slug;
        $attr['kelas_id'] = request('kelas');
        Siswa::create($attr);
        session()->flash('success', 'Siswa Berhasil Ditambahkan');
        //$siswa->pelajarans()->attach(request('pelajarans'));
        return redirect('siswa');
    }

    public function destroy($kelas){
        Kelas::where('slug', $kelas)->delete();
        session()->flash('success', 'Kelas Berhasil Terhapus');
        return redirect('kelas')->with('status', 'Data berhasil dihapus');
    }
}