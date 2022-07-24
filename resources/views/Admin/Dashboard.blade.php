@extends('Admin.Menu.admin')
@section('breadcrumbs')
        
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
@endsection
@section('content')

@if(auth()->user()->role == 'Admin')
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-5" style="border-top: 3px solid rgb(247, 6, 6);">
                    <div class="card-header bg-dark text-white">
                        <i class="fas fa-user-alt"></i><strong> Profile Identitas Admin</strong> <small> </small>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-sm-4 small">
                                <div class="table-responsive">
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        <tr>
                                            <td>Nama Admin</td>
                                            <td>:</td>
                                            <td class="font-weight-bold">{{ Auth::user()->username }}</td>
                                        </tr>
                                        <tr>
                                            <td>NIP</td>
                                            <td>:</td>
                                            <td class="font-weight-bold">{{ Auth::user()->no_induk }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@elseif(auth()->user()->role == 'Guru')
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-5" style="border-top: 3px solid rgb(247, 6, 6);">
                    <div class="card-header bg-dark text-white">
                        <i class="fas fa-user-alt"></i><strong> Profile Identitas Guru</strong> <small> </small>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-sm-4 small">
                                <div class="table-responsive">
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        <tr>
                                            <td>Nama Guru</td>
                                            <td>:</td>
                                            <td class="font-weight-bold">{{ Auth::user()->username }}</td>
                                        </tr>
                                        <tr>
                                            <td>NIP</td>
                                            <td>:</td>
                                            <td class="font-weight-bold">{{ Auth::user()->no_induk }}</td>
                                        </tr>
                                        <tr>
                                            <td>Walikelas</td>
                                            <td>:</td>
                                            <td class="font-weight-bold">{{ Auth::user()->guru->kelas->kelas}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@else
<div class="container-fluid">
<div class="middle">
      <div class="menu col-sm-12">
        <li class="item" id='profile'>
          <a href="#profile" class="btr"><i class="fa fa-user"></i>Profile</a>
          <div class="smenu col-sm-12">
                <div class="card mt-3 mb-5" style="border-top: 3px solid rgb(247, 6, 6);">
                    <div class="card-header bg-dark text-white">
                        <i class="fas fa-user-alt"></i><strong> Profile Identitas Peserta Didik</strong> <small> </small>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-sm-8 small">
                                <div class="table-responsive">
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        <tr>
                                            <td>Nama Peserta Didik</td>
                                            <td>:</td>
                                            <td class="font-weight-bold">{{ Auth::user()->siswa->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td>NISN</td>
                                            <td>:</td>
                                            <td class="font-weight-bold">{{ Auth::user()->siswa->nisn }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kelas</td>
                                            <td>:</td>
                                            <td>{{ Auth::user()->siswa->kelas->kelas }}</td>
                                        </tr>
                                        <tr>
                                            <td>Semester</td>
                                            <td>:</td>
                                            <td>{{ Auth::user()->siswa->semester }}</td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td>{{ Auth::user()->siswa->status }}</td>
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
        </li>

        

        <li class="item" id="ujian">
          <a href="#ujian" class="btr"><i class="fa fa-tasks"></i>Hasil Ujian</a>
          <div class="smenu col-sm-12">
                              <table class="table table-striped table-sm mt-3" width="100%">
                                <thead class="thead-dark">
                                <tr>
                                  <th>No</th>
                                  <th>Pelajaran</th>
                                  <th>Ujian</th>
                                  <th>KD</th>
                                  <th>Nilai KD</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $no=1;
                                ?>
                            @foreach(Auth::user()->siswa->ujians as $ujian)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $ujian->pelajaran->pelajaran }}</td>
                                        <td>{{ $ujian->nama_ujian }}</td>
                                        <td>
                                            @foreach($ujian->nilais as $nilai)
                                                <p>{{ $nilai->kd ?? 'Belum Tersedia'}}</p>
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($ujian->nilais as $nilai)
                                                <p>{{ $nilai->pivot->nilai_kd ?? 'Belum Tersedia'}}</p>
                                            @endforeach
                                        </td>
                                    </tr>
                              @endforeach
                                </tbody>
                              </table>
                            <!-- 
                @if(Auth::user()->siswa === NULL) @endif-->
                
          </div>
        </li>
      </div>
    </div>
</div>
@endif
@endsection
