@extends('Admin.Menu.admin')
@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>NILAI UJIAN</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Beranda</a></li>
                            <li class="active">Ujian</li>
                        </ol>
                    </div>
                </div>
            </div>
</div>
@endsection
@section('content')
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                            @include('Admin.alert')
                                <div class="btn-group mb-3">
                                    <a href="{{ route('admin.tambah_ujian') }}" class="btn btn-info btn-sm mr-2"><i class="fa fa-plus"></i> 
                                        Tambah Nilai</a>
                                            <form action="{{ url('ujianDeleteAll')}}" method="post">
                                                @csrf
                                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> 
                                                        Delete All Select
                                                    </button>
                                            </form>
                                </div>
                            @if($ujians->count())
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-sm" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="30px">No</th>
                                            <th>NISN</th>
                                            <th>NAMA</th>
                                            <th>UJIAN</th>
                                            <th>KELAS</th>
                                            <th>PELAJARAN</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($ujians as $no => $ujian)
                                            <tr>
                                                <td>{{ ++$no + ($ujians->currentPage()-1) * $ujians->perPage() }}</td>
                                                <td>{{ $ujian->siswa->nisn}}</td>
                                                <td>{{ $ujian->siswa->nama}}</td>
                                                <td>{{ $ujian->nama_ujian}}</td>
                                                <td>{{ $ujian->siswa->kelas->kelas}}</td>
                                                <td><span class="badge badge-primary">{{ $ujian->pelajaran->pelajaran }}</span></td>
                                                <td>
                                                    <a href="/hasil/{{ $ujian->id }}" class="btn btn-success btn-sm">Buka</a>
                                                    <form action="{{ url('ujian/'.$ujian->id) }}" class="d-inline" method="post" onsubmit="return confirm('apakah anda ingin menghapusnya ?')">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <div class="alert alert-info text-center">
                                            <i style="color: red;" class="fa fa-times-circle-o fa-5x"></i>
                                            <h3>Ujian Belum Tersedia</h3>
                                        </div>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
    </div>
</div>
@endsection
