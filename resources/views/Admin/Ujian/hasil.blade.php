@extends('Admin.Menu.admin')
@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Nilai Ujian</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            @if(auth()->user()->role == 'Admin')
                            <li><a href="{{ route('Admin.Ujian.ujian')}}">Kembali</a></li>
                            @elseif(auth()->user()->role == 'Guru')
                            <li><a href="{{ url()->previous() }}">Kembali</a></li>
                            @endif
                        </ol>
                    </div>
                </div>
            </div>
</div>
@endsection
@section('content')
<div class="container-fluid">
        <div class="row">
        @include('Admin.alert')
            <div class="col-sm-12">
                <div class="card mb-5" style="border-top: 3px solid rgb(247, 6, 6);">
                    <div class="card-header bg-dark text-white">
                        <i class="fas fa-user-alt"></i><strong> Tambah Nilai {{ $ujian->nama_ujian}}</strong> <small> </small>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-sm-4 small">
                                <div class="table-responsive">
                                <table class="table table-borderless table-sm">
                                    <tbody>
                                        <tr>
                                            <td>Nama Peserta Didik</td>
                                            <td>:</td>
                                            <td class="font-weight-bold">{{ $ujian->siswa->nama }}</td>
                                        </tr>
                                        <tr>
                                            <td>NISN</td>
                                            <td>:</td>
                                            <td class="font-weight-bold">{{ $ujian->siswa->nisn }}</td>
                                        </tr>
                                        <tr>
                                            <td>Kelas</td>
                                            <td>:</td>
                                            <td>{{ $ujian->siswa->kelas->kelas }}</td>
                                        </tr>
                                        <tr>
                                            <td>Pelajaran</td>
                                            <td>:</td>
                                            <td>{{$ujian->pelajaran->pelajaran}}</td>
                                        </tr>
                                        <tr>
                                            <td>Semester</td>
                                            <td>:</td>
                                            @if($ujian->siswa->semester == 'Semester 1')
                                                        <td>Semester 1</td>
                                                    @else
                                                        <td>Semester 2</td>
                                                    @endif
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                                    @if($ujian->siswa->status == 'Aktif')
                                                    <td>Aktif</td>
                                                    @else
                                                    <td>Tidak Aktif</td>
                                                    @endif
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
                    <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#tambah_nilai-kd"><i class="fa fa-plus fa-sm"></i> Tambah Nilai</button>
                        <div class="row">
                            <div class="col-sm-12 table-responsive">
                              <table class="table table-striped table-sm" width="100%">
                                <thead class="thead-dark">
                                <tr>
                                  <th>No</th>
                                  <th>KD</th>
                                  <th>Nilai KD</th>
                                  <th>Opsi</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    $no=1; 
                                ?>
                            @foreach($ujian->nilais as $nilai)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $nilai->kd }}</td>
                                        <td>{{ $nilai->pivot->nilai_kd }}</td>
                                        <td><a href="/Hapuskd/{{$ujian->id}}/{{ $nilai->id }}/addhapus" class="btn btn-danger btn-sm" onsubmit="return confirm('apakah anda ingin menghapusnya ?')">Hapus</a></td></td>
                                    </tr>
                              @endforeach
                                </tbody>
                              </table>
                            </div>
                            <!-- /.col -->
                            @include("Admin.Ujian.nilai-kd")
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection