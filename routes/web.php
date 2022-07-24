<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth', 'checkrole:Admin']],function(){
    Route::get('ujian', 'UjianController@index')->name('Admin.Ujian.ujian');

    Route::get('jabatan', 'JabatanController@index')->name('Admin.Jabatan.jabatan');
    Route::post('post/jabatan', 'JabatanController@store')->name('post.jabatan');

    Route::get('nilai', 'NilaiController@index')->name('Admin.Nilai.nilai');
    Route::post('post/kd', 'NilaiController@store')->name('post.nilai');
    Route::delete('kd/{id}', 'NilaiController@destroy');

    Route::get('ktkelas', 'KtkelasController@index')->name('Admin.Ktkelas.ktkelas');
    Route::post('post/ktkelas', 'KtkelasController@store')->name('post.ktkelas');
    Route::delete('ktkelas/{id}', 'KtkelasController@destroy');

    Route::get('user', 'UserController@index')->name('Admin.User.guru-user');
    Route::post('Admin/user', 'UserController@store')->name('admin.user');
    Route::delete('delete/{user:id}', 'UserController@destroy');
    
    Route::delete('jabatan/{id}', 'JabatanController@destroy');
    Route::post('ujianDeleteAll', 'UjianController@deleteAll');
    Route::post('siswaDeleteAll', 'SiswaController@deleteAll');
});

Route::group(['middleware' => ['auth', 'checkrole:Admin,Guru']],function(){
    Route::get('siswa', 'SiswaController@data_siswa')->name('Admin.Siswa.siswa');
    Route::get('Admin/tambah_siswa', 'SiswaController@create')->name('post.tambah_siswa');
    Route::post('siswa/{siswa:id}/addnilai', 'SiswaController@addnilai');
    Route::get('profile/{siswa:id}', 'SiswaController@buka');
    Route::get('Hapus/{siswa:id}/{idplj}/addhapus', 'SiswaController@addhapus');
    Route::post('post/tambahkan', 'SiswaController@tambahkan')->name('post.tambahkan');
    Route::get('Admin/{siswa:slug}/edit', 'SiswaController@edit');
    Route::patch('Admin/{siswa:slug}/edit', 'SiswaController@tambah');
    Route::delete('Hapus/{id}', 'SiswaController@destroy');

    Route::get('pelajaran', 'PelajaranController@categori')->name('Admin.Pelajaran.pelajaran');
    Route::post('post/pelajaran', 'PelajaranController@pelajaran')->name('post.pelajaran');
    Route::delete('pelajaran/{id}', 'PelajaranController@destroy');

    Route::get('guru', 'GuruController@index')->name('Admin.Guru.guru');
    Route::get('Admin/tambah_guru', 'GuruController@create')->name('admin.tambah_guru');
    Route::post('guru/store', 'GuruController@store')->name('guru.store');
    Route::delete('hapus/{id}', 'GuruController@destroy');

    Route::get('kelas', 'MakeController@index')->name('Admin.Kelas.kelas');
    Route::get('kelas/{kelas:id}/edit', 'MakeController@edit');
    Route::patch('kelas/{kelas:id}/edit', 'MakeController@tambahkan');
    Route::get('Admin/tambah_kelas', 'MakeController@create')->name('admin.tambah_kelas');
    Route::get('kelas/{kelas:id}', 'MakeController@buka');
    Route::post('kelas/store', 'MakeController@store')->name('kelas.store');
    Route::delete('post/{slug}', 'MakeController@destroy');
    Route::get('guru/tambah_siswa', 'MakeController@add')->name('guru.tambah_siswa');
    Route::post('guru/tambah', 'MakeController@tambah')->name('guru.tambah');

    Route::get('Admin/tambah_ujian', 'UjianController@create')->name('admin.tambah_ujian');
    Route::post('get/ujian', 'UjianController@star')->name('get.ujian');
    Route::post('post/ujian', 'UjianController@store')->name('post.ujian');
    Route::post('nilai/{ujian:id}/addnilai', 'UjianController@addnilai');
    Route::get('Hapuskd/{ujian:id}/{idkd}/addhapus', 'UjianController@addhapus');
    Route::delete('ujian/{id}', 'UjianController@destroy');
    Route::get('hasil/{ujian:id}', 'UjianController@buka');

    Route::get('Kelas', 'HomeController@kelas')->name('Admin.Kelas.logprof');
});

Route::group(['middleware' => ['auth', 'checkrole:Admin,Guru,Siswa']],function(){
    Route::get('dashboard', 'HomeController@index')->name('Admin.Dashboard');
    Route::get('pengumuman', 'PengumumanController@index')->name('Admin.Pengumuman.pengumuman');
});