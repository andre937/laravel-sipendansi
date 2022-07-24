<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\GuruRequest;
use Illuminate\Support\Str;
use App\{Guru, User, Jabatan};

class GuruController extends Controller
{
    public function index()
    {
        return view('Admin.Guru.guru', [
            'gurus' => Guru::latest()->paginate(),
        ]);
    }

    public function create()
    {
        return view('Admin.Guru.create', [
            'guru' => new Guru(),
            'jabatans' => Jabatan::get(),
            'users' => User::get(),
        ]);
    }

    public function store(GuruRequest $request)
    {
        $user = new User;
        $user->no_induk = $request->nip;
        $user->role = 'Guru';
        $user->username = $request->nama_guru;
        $user->password = bcrypt(request('nip'));
        $user->remember_token = str::random(60);
        $user->save();
        $request->request->add(['user_id' => $user->id]);
        $attr = $request->all();
        $attr['jabatan_id'] = request('nama_jabatan');
        Guru::create($attr);
        return redirect()->to('guru');
    }

    public function destroy($guru)
    {
        Guru::where('id', $guru)->delete();
        return redirect('guru')->with('status', 'Data berhasil dihapus');
    }
}
