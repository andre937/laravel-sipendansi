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
        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                            @include('Admin.alert')
                                
                            @if(auth()->user()->role == 'Admin')
                                <div class="btn-group mb-3">
                                    <a href="{{ route('post.tambah_siswa') }}" class="btn btn-info btn-sm mr-2"><i class="fa fa-plus"></i> 
                                        Tambah Siswa</a>
                                        
                                        <form action="{{ url('siswaDeleteAll')}}" method="post">
                                                @csrf
                                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i> 
                                                        Delete All
                                                    </button>
                                            </form>
                                </div>
                                
                                @endif
                            @if($siswas->count())
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-sm" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="30px">No</th>
                                            <th>NISN</th>
                                            <th>Nama Siswa</th>
                                            <th>Kelas</th>
                                            <th>Semester</th>
                                            <th>Status</th>
                                            @if(auth()->user()->role == 'Admin')
                                            <th>Opsi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($siswas as $no => $siswa)
                                            <tr>
                                                <td>{{ ++$no + ($siswas->currentPage()-1) * $siswas->perPage() }}</td>
                                                <td>{{ $siswa->nisn }}</td>
                                                <td>{{ $siswa->nama }}</td>
                                                <td>{{ $siswa->kelas->kelas ?? ' Belum tersedia '}}</td>
                                                    @if($siswa->semester == 'Semester 1')
                                                        <td>Semester 1</td>
                                                    @else
                                                        <td>Semester 2</td>
                                                    @endif
                                                
                                                <td>
                                                    @if($siswa->status == 'Aktif')
                                                    <span class="badge badge-success">Aktif</span>
                                                    @else
                                                    <span class="badge badge-danger">Tidak Aktif</span>
                                                    @endif
                                                </td>
                                                @if(auth()->user()->role == 'Admin')
                                                <td>
                                                    <a href="/profile/{{ $siswa->id }}" class="btn btn-success btn-sm">Buka</a>
                                                    <a href="/Admin/{{$siswa->slug}}/edit" class="btn btn-info btn-sm">Edit</a>
                                                    <form action="{{ url('Hapus/'.$siswa->id) }}" class="d-inline" method="post" onsubmit="return confirm('apakah anda ingin menghapusnya ?')">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    @else
                                        
                                    <div class=" text-center">
                                        <img src="{{ asset('img/2.png')}}" class="mb-3" width="700px">
                                            <h3>Siswa Belum Tersedia</h3>
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
