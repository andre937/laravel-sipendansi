<?php

namespace App\Http\Controllers;
use App\{User};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index(){
        //jika ingin digabungkan dengan tabel lain
        return view('Admin.User.guru-user', ['user' => User::with('siswa')->get()]);
    }

    public function store(UserRequest $request){
        User::insertGetId([
            'no_induk' => $request->get('no_induk'),
            'username' => $request->get('username'),
            'password' => Hash::make($request->get('password')),
            'role' => $request->get('role'),
        ]);

        //catatan : fungsi dibawah digunakan bila ingin menambah data di table user
        //User::findOrfail($data)->ujian()->saveMany([
            //new Ujian([
                //'uts' => $request->get('uts'),
                //'uas' => $request->get('uas'),
                //])
        //]);
        return redirect()->to('user');
    }

    public function destroy(Request $request, User $user){
        $this->authorize('delete', $user);
        if($request->user()->role == 'Admin' && $user->role == 'Admin'){
            return redirect()->to('user')->with('error', 'Admin tidak bisa dihapus');
        }
        $user->delete();
        return redirect()->to('user');
    }
}
