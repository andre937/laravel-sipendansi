@extends('Admin.Menu.admin')
@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Siswa</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Beranda</a></li>
                            <li><a href="{{ route('Guru.siswa')}}">Siswa</a></li>
                            <li class="active">Nilai</li>
                        </ol>
                    </div>
                </div>
            </div>
</div>
@endsection
@section('content')
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mt-3 mb-3" style="border-top: 3px solid rgb(247, 6, 6);">
                    <div class="card-header bg-dark text-white">
                        <i class="fas fa-user-alt"></i><strong> Profile Identitas Peserta Didik</strong> <small> </small>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-sm-5 small">
                                <div class="table-responsive">
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        <tr>
                                            <td>Nama Peserta Didik</td>
                                            <td>:</td>
                                            <td class="font-weight-bold">{{ $siswa->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td>NIS / NISN</td>
                                            <td>:</td>
                                            <td>{{ $siswa->nis }} / {{ $siswa->nisn }}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama Sekolah</td>
                                            <td>:</td>
                                            <td>SD Negara Setu 02</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat Sekolah</td>
                                            <td>:</td>
                                            <td>Jl. Pendidikan Kec. Tarub Kab. Tegal</td>
                                        </tr>
                                        <tr>
                                            <td>Kelas</td>
                                            <td>:</td>
                                            <td>{{ $siswa->kelas->kelas }}</td>
                                        </tr>
                                        <tr>
                                            <td>Semester</td>
                                            <td>:</td>
                                            <td>{{ $siswa->semesters['nama'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tahun Pelajaran</td>
                                            <td>:</td>
                                            <td>2020 / 2021</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                              <table class="table table-striped table-bordered table-sm" width="100%">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>No.</th>
                                        <th>Pelajaran</th>
                                        <th>UTS</th>
                                        <th>UAS</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <?php 
                                    $no=1;
                                ?>
                                <tbody>
                                    @foreach($siswa->pelajarans as $pelajaran)
                                    <tr>
                                        <td>{{$no++}}</td>
                                        <td>{{$pelajaran->pelajaran}}</td>
                                        <td>80</td>
                                        <td>98</td>
                                        <td>
                                        <a href="/lihat/{{ $siswa->slug }}" class="btn btn-success btn-sm">Buka</a>
                                        <form action="/delete/{{ $siswa->id }}" class="d-inline" method="post" onsubmit="return confirm('apakah anda ingin menghapusnya ?')">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm">
                                                            Hapus
                                                        </button>
                                                    </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                              </table>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection