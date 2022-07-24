@extends('Admin.Menu.admin')
@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Guru</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Beranda</a></li>
                            <li class="active">Guru</li>
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
                    @include('Admin.alert')
                        <div class="card">
                            <div class="card-body">
                            <div class="btn-group mb-3">
                                    <a href="{{ route('admin.tambah_guru') }}" class="btn btn-info btn-sm mr-2"><i class="fa fa-plus"></i> 
                                        Tambah Guru</a>
                                </div>
                            @if($gurus->count())
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-sm" width="100%">
                                    <thead>
                                    
                                        <tr>
                                            <th width="30px">No</th>
                                            <th>NIP</th>
                                            <th>Guru</th>
                                            <th>Jabatan</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($gurus as $no => $guru)
                                            <tr>
                                                <td>{{ ++$no + ($gurus->currentPage()-1) * $gurus->perPage() }}</td>
                                                <td>{{ $guru->nip }}</td>
                                                <td>{{ $guru->nama_guru }}</td>
                                                <td>{{ $guru->jabatans->nama_jabatan ?? ' Belum Tersedia '}}</td>
                                                <td>
                                                    <form action="{{ url('hapus/'.$guru->id) }}" class="d-inline" method="post" onsubmit="return confirm('apakah anda ingin menghapusnya ?')">
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
                                        <div class=" text-center">
                                        <img src="{{ asset('img/4.png')}}" class="mb-3" width="700px">
                                            <h3>Guru Belum Tersedia</h3>
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
