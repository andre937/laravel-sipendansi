@extends('Admin.Menu.admin')
@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Kelas</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Beranda</a></li>
                            <li class="active">Kelas</li>
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
                                    <a href="{{ route('admin.tambah_kelas') }}" class="btn btn-info btn-sm mr-2"><i class="fa fa-plus"></i> 
                                        Tambah Kelas</a>
                                </div>
                            @if($kelases->count())
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-sm" width="100%">
                                    <thead>
                                    
                                        <tr>
                                            <th width="30px">No</th>
                                            <th>WaliKelas</th>
                                            <th>Kelas</th>
                                            <th>Tahun Pelajaran</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($kelases as $no => $kelas)
                                            <tr>
                                                <td>{{ ++$no + ($kelases->currentPage()-1) * $kelases->perPage() }}</td>
                                                <td>{{ $kelas->guru->nama_guru ?? ' Belum Tersedia '}}</td>
                                                <td><span class="badge badge-primary">{{ $kelas->kelas }}</span></td>
                                                <td><span class="badge badge-primary">{{ $kelas->awal_tahun }} / {{ $kelas->akhir_tahun }}</span></td>
                                                <td>
                                                <a href="/kelas/{{ $kelas->id }}" class="btn btn-success btn-sm">Buka</a>
                                                <a href="/kelas/{{ $kelas->id }}/edit" class="btn btn-info btn-sm">Edit</a>
                                                @if(auth()->user()->role == 'Admin')
                                                    <form action="{{ url('post/'.$kelas->slug) }}" class="d-inline" method="post" onsubmit="return confirm('apakah anda ingin menghapusnya ?')">
                                                        @method('delete')
                                                        @csrf
                                                        <button class="btn btn-danger btn-sm">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        
                                    <div class=" text-center">
                                        <img src="{{ asset('img/5.png')}}" class="mb-3" width="700px">
                                            <h3>Kelas Belum Tersedia</h3>
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
