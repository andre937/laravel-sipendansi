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
                            <li class="active">Siswa</li>
                        </ol>
                    </div>
                </div>
            </div>
</div>
@endsection
@section('content')
<div class="middle">
      <div class="menu col-sm-12">
        <li class="item" id='profile'>
          <a href="#profile" class="btr"><i class="fa fa-user"></i>Profile Walikelas Kelas {{ $kelas->kelas }}</a>
          <div class="smenu col-sm-12">
                <div class="card mt-3 mb-5" style="border-top: 3px solid rgb(247, 6, 6);">
                    <div class="card-header bg-dark text-white">
                        <i class="fas fa-user-alt"></i><strong> Walikelas Kelas {{ $kelas->kelas }}</strong> <small> </small>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-sm-8 small">
                                <div class="table-responsive">
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        <tr>
                                            <td>Walikelas</td>
                                            <td>:</td>
                                            <td class="font-weight-bold">{{ $kelas->guru->nama_guru }}</td>
                                        </tr>
                                        <tr>
                                            <td>NIP</td>
                                            <td>:</td>
                                            <td class="font-weight-bold">{{ $kelas->guru->nip }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kelas</td>
                                            <td>:</td>
                                            <td>{{ $kelas->kelas }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tahun Pelajaran</td>
                                            <td>:</td>
                                            <td>{{ $kelas->awal_tahun }} / {{ $kelas->akhir_tahun }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
          </div>
        </li>
        <li class="item" id="settings">
          <a href="#settings" class="btr"><i class="fa fa-tasks"></i>Nama Siswa Kelas {{ $kelas->kelas }}</a>
          <div class="smenu col-sm-12">
            <table class="table table-striped table-sm mt-3" width="100%">
                                <thead class="thead-dark">
                                <tr>
                                  <th>No</th>
                                  <th>NISN</th>
                                  <th>Nama Siswa</th>
                                  <th>Kelas</th>
                                  <th>Opsi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $no=1;
                                ?>
                            @foreach($kelas->siswas as $siswa)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $siswa->nisn }}</td>
                                        <td>{{ $siswa->nama }}</td>
                                        <td>{{ $siswa->kelas->kelas }}</td>
                                        <td>
                                        <a href="/profile/{{ $siswa->id }}" class="btn btn-success btn-sm">Profil</a>
                                        </td>
                                    </tr>
                              @endforeach
                                </tbody>
            </table>
          </div>
        </li>
      </div>
</div>

@endsection