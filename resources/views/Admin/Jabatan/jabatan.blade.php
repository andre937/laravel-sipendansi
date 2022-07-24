@extends('Admin.Menu.admin')
@section('breadcrumbs')
<div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Jabatan</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Beranda</a></li>
                            <li class="active">Jabatan</li>
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
                            <button class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#jabatan"><i class="fa fa-plus fa-sm"></i> Tambah Jabatan</button>
                            @if($jabatans->count())
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered table-sm" width="100%">
                                    <thead>
                                    
                                        <tr>
                                            <th width="30px">No</th>
                                            <th>Jabatan</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($jabatans as $no => $jabatan)
                                            <tr>
                                                <td>{{ ++$no + ($jabatans->currentPage()-1) * $jabatans->perPage() }}</td>
                                                <td><span class="badge badge-primary">{{ $jabatan->nama_jabatan }}</span></td>
                                                <td>
                                                    <form action="{{ url('jabatan/'.$jabatan->id) }}" class="d-inline" method="post" onsubmit="return confirm('apakah anda ingin menghapusnya ?')">
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
                                            <h3>Jabatan Belum Tersedia</h3>
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
        @include("Admin.Jabatan.add")
    </div>
</div>
@endsection
