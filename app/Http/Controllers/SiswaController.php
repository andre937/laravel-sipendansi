<?php

namespace App\Http\Controllers;

use App\{Kelas, Siswa, Ujian, User, Pelajaran};
use App\Http\Requests\PostRequest;
use Illuminate\Support\Str;
class SiswaController extends Controller
{
    
    public function data_siswa(){
        return view('Admin.Siswa.siswa', [
            'siswas' => Siswa::latest()->paginate(),
        ]);
    }

    public function buka(Siswa $siswa){
        $ujians = Ujian::all();
        return view('Admin.Siswa.profile', [
            'ujian' => new Ujian(),
            'siswas' => Siswa::get(),
            'pelajarans' => Pelajaran::get(),
            'ujians'=> $ujians,
        ], compact('siswa','ujians'));
    }

    public function create(){
        return view('post.tambah_siswa', [
            'siswa' => new Siswa(),
            'kelases' => Kelas::get(),
            //'pelajarans' => Pelajaran::get(),
        ]);
    }
    
    public function tambahkan(PostRequest $request){

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
        session()->flash('success', 'Data Siswa Berhasil Di tambahkan');
        //$siswa->pelajarans()->attach(request('pelajarans'));
        return redirect('siswa');
    }

    public function edit(Siswa $siswa){
        return view('post.edit', [
            'siswa' => $siswa,
            'users' => User::get(),
            'kelases' => Kelas::get(),
            //'pelajarans' => Pelajaran::get(),
        ]);
    }

    public function tambah(PostRequest $request, Siswa $siswa){
        
        $attr = $request->all();
        $slug = \Str::slug(request('nama'));
        $attr['slug'] = $slug;
        $attr['user_id'] = request('no_induk');
        $attr['kelas_id'] = request('kelas');
        $siswa->update($attr);
        session()->flash('success', 'Data Siswa Berhasil Di Edit');
        //$siswa->pelajarans()->sync(request('pelajarans'));
        return redirect('siswa');
    }

    public function deleteAll(){
        Siswa::whereNotNull('id')->delete();
        return redirect('siswa')->with('success', 'Data telah terhapus');
     }

    public function destroy($id){
        $siswa = Siswa::find($id);
        $siswa->delete();
        session()->flash('success', 'Data Siswa Berhasil Di Hapus');
        return redirect('siswa');
    }
}
